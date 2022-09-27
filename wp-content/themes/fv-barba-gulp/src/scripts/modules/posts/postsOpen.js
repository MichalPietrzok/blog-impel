const postOpen = () => {
  for (const item of elts('.postcard')) {
    item.addEventListener('click', (e) => {
      if (e.target.dataset.post !== 'tag') {
        const currentDecore = item.querySelector('.postcard-decore')
        const currentImage = item.querySelector('.postcard-image')
        const currentTop = currentDecore.getBoundingClientRect().top
        const currentLeft = currentDecore.getBoundingClientRect().left
        gsap.timeline()
          .to('.page-transition', {
            width: currentDecore.offsetWidth,
            height: currentDecore.offsetHeight,
            top: currentTop,
            left: currentLeft,
            display: 'flex',
            opacity: 1,
            duration: 0,
            background: `url(${currentImage.src}) no-repeat center / cover`
          })
          .to('.page-transition', {
            width: '100vw',
            height: screen.width > 992 ? '90vh' : '75vh',
            left: 0,
            top: elt('#main-header').offsetHeight + 79,
            duration: .6,
            ease: 'power2.inOut'
          })
        if (e.target.dataset.post !== 'link') {
          barba.go(item.dataset.link)
        }
      }
    })
  }
}
