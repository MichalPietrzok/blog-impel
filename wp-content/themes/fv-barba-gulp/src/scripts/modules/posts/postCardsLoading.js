const postCardsLoading = () => {
  if (elts('.postcard').length) {
    pageState.readyToLoad = false
    const pageLoaderLine = new TimelineMax()
    for (let i = 1; i < elts('.postcard').length; i++) {
      pageLoaderLine.fromTo(elts('.postcard')[i], { opacity: 0, scale: .97 }, { opacity: 1, scale: 1, duration: .3 }, '-=.15')
      if (i === elts('.postcard').length - 1) {
        pageLoaderLine.add(() => {
          pageState.readyToLoad = true
        })
      }
    }
  }
}
