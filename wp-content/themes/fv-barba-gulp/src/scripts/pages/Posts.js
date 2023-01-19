class Post extends Page {
  beforeEnterFunction() {
    setTimeout(() => {
      elt('.site-content').classList.remove('site-content--home');
      elt('.header').classList.add('header--post');
    }, 0)
  }

  afterEnterFunction() {
    postCardsLoading()
    const accordionsElts = document.querySelectorAll('[data-accordion="wrap"]')
    if (accordionsElts.length) {
      const accordions = []
      accordionsElts.forEach(($accordion, i) =>
        accordions.push(new Accordion($accordion, i)))
    }
    const introLine = new TimelineMax()
    introLine
      .to('.page-transition', { opacity: 0, display: 'none' })
      .fromTo('.intro__tags', { y: 30, opacity: 0 }, { y: 0, opacity: 1 }, '+=.3')
      .fromTo('.intro__title', { y: 30, opacity: 0 }, { y: 0, opacity: 1 }, '-=.2')
      .fromTo('.intro__date', { y: 30, opacity: 0 }, { y: 0, opacity: 1 }, '-=.2')
    setTimeout(() => {
      postOpen()
      postTagsPaint()
      let currentIndent = screen.height;
      const contentTop = getCoords(elt('.post-info__content')).top;
      const contentHeight = elt('.post-info__content').offsetHeight;
      const contentFinish = contentTop + contentHeight;
      if (elt('.experts__post')) {
        const expertsHeight = elt('.experts__post').offsetHeight;
        currentIndent = screen.height + expertsHeight * 2.5;
      }
      window.addEventListener('scroll', () => {
        if (elt('.post-info__share')) {
          const scrollAction = window.scrollY < currentIndent - 10
          || window.scrollY > contentFinish - screen.height / 2;
          if (screen.width > 1200) {
            if (!scrollAction) {
              elt('.post-info__share').style.opacity = 1
              elt('.post-info__share').style.transform = 'none';
            } else {
              elt('.post-info__share').style.opacity = 0
              elt('.post-info__share').style.transform = 'translateY(30vh)';
            }
          }
        }
      })
    }, 0)
  }

  beforeLeaveFunction() {
    gsap.timeline().to('.main-info', { opacity: 0, scale: .97, duration: .3 }, '<')
    postCardsHide()
  }
}

const Posts = []
const arrSiglePosts = singlePostCounter.split(', ')

for (const item of arrSiglePosts) {
  Posts.push(new Post(`post-${item}`))
}
