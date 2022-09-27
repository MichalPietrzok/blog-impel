const postCardsHide = () => {
  if (elts('.postcard').length) {
    const pageLoaderLine = new TimelineMax()
    pageLoaderLine.to(elts('.postcard')[0], { opacity: 0, scale: .95, duration: .3 })
    for (let i = 1; i < 4; i++) {
      pageLoaderLine.to(elts('.postcard')[i], { opacity: 0, scale: .97, duration: .3 }, '-=.18')
    }
  }
}
