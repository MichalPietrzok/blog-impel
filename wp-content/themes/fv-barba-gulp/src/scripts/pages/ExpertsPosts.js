class ExpertsPost extends Page {
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
    }, 0)
  }

  beforeLeaveFunction() {
    postCardsHide()
  }
}

const ExpertsPosts = []
const arrExpertsPosts = singleExpertsCounter.split(', ')

for (const item of arrExpertsPosts) {
  ExpertsPosts.push(new ExpertsPost(`experts-${item}`))
}
