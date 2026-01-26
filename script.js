/*----------------------------------------
GSAP plugins
----------------------------------------*/
gsap.registerPlugin(ScrollTrigger);

/*----------------------------------------
hamburger menu
----------------------------------------*/
const hamuburger = document.querySelector('#header .hamburger');
const nav = document.querySelector('#header nav');
const list = document.querySelectorAll('#header nav li');

let isNavOpen = false;

hamuburger.addEventListener('click', () => {
  hamuburger.classList.toggle('active');
  nav.classList.toggle('active');
  isNavOpen = !isNavOpen;

  if (isNavOpen) {
    gsap.fromTo(list, 
      { 
        opacity: 0, 
        y: -40 
      },
      { 
        delay: 0.5,
        opacity: 1, 
        y: 0, 
        duration: 1.5, 
        stagger: 0.5,
        ease: 'power2.out'
      }
    );
  } else {
    gsap.to(list, {
      opacity: 0,
      duration: 0.3
    });
  }
});

//navリンククリックでメニューを閉じる
const navLinks = document.querySelectorAll('#header nav a');
navLinks.forEach(link => {
  link.addEventListener('click', () => {
    if (isNavOpen) {
      hamuburger.classList.remove('active');
      nav.classList.remove('active');
      isNavOpen = false;
    }
  });
});


/*----------------------------------------
スクロールでfadein（下方向のみ進行 / 上方向は保持）
----------------------------------------*/
const fadein = document.querySelectorAll('.fadein');
fadein.forEach(element => {
  // 初期スケール設定（JS開始前のちらつき防止）
  gsap.set(element, { scale: 0.4 });
  // 手動進行用のtween（paused）
  const tween = gsap.fromTo(element, { scale: 0.4 }, { scale: 1, ease: 'none', paused: true });
  let maxProgress = 0; // これまで到達した最大進捗を保持
  ScrollTrigger.create({
    trigger: element,
    start: 'top 95%',
    end: 'top 60%',
    scrub: true,
    onUpdate: self => {
      // 下方向（progressが新しい最大）だけ進行、上方向は最大値を維持
      if (self.progress > maxProgress) {
        maxProgress = self.progress;
        tween.progress(maxProgress);
      } else {
        tween.progress(maxProgress);
      }
    }
  });
});


/*----------------------------------------
カウントアップ
----------------------------------------*/
const counters = document.querySelectorAll('.count');
const speed = 1000;

const countUp = (entry) => {
  if (entry.isIntersecting) {
    counters.forEach(counter => {
      const target = +counter.dataset.target;
      const update = () => {
        const current = +counter.innerText;
        const increment = target / speed;
        if (current < target) {
          counter.innerText = Math.ceil(current + increment);
          setTimeout(update, 20);
        } else {
          counter.innerText = target;
        }
      };
      update();
    });
  }
};

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => countUp(entry));
}, { threshold: 0.6 });

counters.forEach(counter => observer.observe(counter));


/*----------------------------------------
reasonパネルを回転
----------------------------------------*/
const panels = document.querySelectorAll('.panel');

gsap.to(panels, {
  scrollTrigger: {
    trigger: '#reason',
    start: 'top 80%'
  },
  duration: 1,
  stagger: 0.2,
  rotateY: 360,
  ease: 'power2.inOut'
});


/*----------------------------------------
plan-itemをスクロールに合わせて左からスライドイン
----------------------------------------*/
const planItems = document.querySelectorAll('.plan-item');

planItems.forEach(item => {
  gsap.fromTo(item,
    { x: -200, opacity: 0 },
    {
      x: 0,
      opacity: 1,
      ease: "none",
      scrollTrigger: {
        trigger: item,
        start: "top 85%",
        end: "top 75%",
        scrub: true,
      }
    }
  );
});


/*------------------------------------
equipmentのアニメーション
----------------------------------------*/
gsap.registerPlugin(ScrollTrigger);

const eqItems = document.querySelectorAll('#equipment .eq-item');

gsap.from(eqItems, {
  opacity: 0,
  y: 150,
  duration: 0.8,
  ease: "power2.out",
  stagger: 0.3, 
  scrollTrigger: {
    trigger: "#equipment",
    start: "top 85%", 
  }
});

// それぞれの eq-item に対して li を個別アニメーション
eqItems.forEach(item => {
  const lists = item.querySelectorAll('.eq-list li');

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: item,
      start: "top 80%",
      toggleActions: "play none none reverse"
    }
  });

  // 初期表示後に li をふわっと出す
  tl.from(lists, {
    opacity: 0,
    y: 30,
    duration: 0.8,
    delay: 0.5,
    ease: "power2.out",
    stagger: 0.3
  });
});



/*----------------------------------------
equipment画像を横スクロール
----------------------------------------*/
let equipmentTimeline;

function setupHorizontalScroll() {
  // 既存のアニメを破棄
  if (equipmentTimeline) {
    if (equipmentTimeline.scrollTrigger) equipmentTimeline.scrollTrigger.kill();
    equipmentTimeline.kill();
    equipmentTimeline = null;
  }

  const isPC = window.innerWidth > 774;

  if (!isPC) {
    // SPではピンが残らないようにスタイルリセット
    const eq = document.querySelector("#equipment");
    eq.style.height = "auto";
    const firstImg = document.querySelector('.horizontals li:first-child img');
    if (firstImg) {
      gsap.set(firstImg, { scale: 1 });
    }
    return;
  }

  const horizontal = document.querySelector('.horizontals');
  const sections = gsap.utils.toArray(".horizontals li");
  const firstImg = document.querySelector('.horizontals li:first-child img');

  // 初期スケール設定
  gsap.set(firstImg, { scale: 0.7 });

  // タイムラインで拡大→横スクロールを順番に実行
  equipmentTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: "#equipment",
      pin: true,
      scrub: 0.5,
      start: "bottom bottom",
      end: () => "+=" + (window.innerHeight + horizontal.scrollWidth),
      invalidateOnRefresh: true
    }
  });

  // 最初の画像を拡大
  equipmentTimeline.to(firstImg, {
    scale: 1,
    ease: "none"
  });

  // 拡大完了後に横スクロール
  equipmentTimeline.to(sections, {
    xPercent: -100 * (sections.length - 1),
    ease: "none"
  }, ">");
}

// 最初の読み込み時
setupHorizontalScroll();

// ウィンドウリサイズ時に再実行
window.addEventListener("resize", () => {
  setupHorizontalScroll();
});


/*----------------------------------------
画像をスクロールに合わせて拡大
----------------------------------------*/
const popUp = document.querySelector('.pop-up');
  gsap.fromTo(popUp,
    { opacity: 0, scale: 0.5 },
    {
      opacity: 1,
      scale: 1,
      ease: "none",
      scrollTrigger: {
        trigger: popUp,
        start: "top 95%",
        end: "top 60%",
        scrub: true,
      }
    }
  );


/*----------------------------------------
FAQ アコーディオン
----------------------------------------*/
const accordionItems = document.querySelectorAll('#faq .accordion li');

accordionItems.forEach(item => {
  const question = item.querySelector('.accordion-q');

  question.addEventListener('click', () => {

    // active が付いていたら閉じる
    if (item.classList.contains('active')) {
      item.classList.remove('active');
      return;
    }

    // 他の項目を全部閉じる（必要なければ削除してOK）
    accordionItems.forEach(i => i.classList.remove('active'));

    // クリックした項目を開く
    item.classList.add('active');
  });
});


const enrollBtn = document.querySelector(".enroll");
const aboutSection = document.getElementById("about");

window.addEventListener("scroll", () => {
  const aboutTop = aboutSection.getBoundingClientRect().top;

  if (aboutTop <= window.innerHeight && aboutTop >= 0) {
    // aboutセクションが画面に入ったら表示
    enrollBtn.classList.add("show");
  } else if (aboutTop > 0) {
    // aboutより上に戻ったら非表示
    enrollBtn.classList.remove("show");
  }
});




