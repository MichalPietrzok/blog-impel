const Rodo = new Page('rodo')

Rodo.beforeEnterFunction = () => {
  elt('.site-content').classList.remove('site-content--home');
  elt('.header').classList.add('header--post');
}

Rodo.afterEnterFunction = () => { }
