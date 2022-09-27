class Category extends Page {
  beforeEnterFunction() {
    setTimeout(() => {
      elt('.site-content').classList.add('site-content--home')
      elt('.header').classList.remove('header--post')
    }, 0)
  }

  afterEnterFunction() {
    setTimeout(() => {
      postCardsLoading()
      postTagsPaint()
      equalHeigth('.banner--categories .postcard-info')
      postOpen()
      const postsSorting = new PostsSorting({
        panel: '.sorting__panel',
        showButton: '.sorting__button',
        sortButtons: '.sorting__list-button',
        wrap: '.sorting',
        sortingLink: '.sorting__summary-link',
        amount: '.sorting__summary-amount',
        links: '.sorting__link',
        reset: '.sorting__reset'
      })
    }, 0)
  }

  beforeLeaveFunction() {
    postCardsHide()
  }
}

const Categories = []
elts('#main-nav .sub-menu a').forEach(item => {
  Categories.push(new Category(item.pathname.slice(item.pathname.lastIndexOf('/', item.pathname.length - 2) + 1, -1)))
})
