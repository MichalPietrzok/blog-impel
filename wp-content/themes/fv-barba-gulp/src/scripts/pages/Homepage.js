const Homepage = new Page('homepage')

Homepage.beforeEnterFunction = () => {
  setTimeout(() => {
    elt('.site-content').classList.add('site-content--home');
    elt('.header').classList.remove('header--post');
  }, 0)
}

Homepage.afterEnterFunction = () => {
  postOpen()
  postTagsPaint()
  setTimeout(() => {
    postCardsLoading()
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

Homepage.beforeLeaveFunction = () => {
  postCardsHide()
}
