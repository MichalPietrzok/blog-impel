const Contact = new Page('contact')

Contact.beforeEnterFunction = () => {
  elt('.site-content').classList.remove('site-content--home');
  elt('.header').classList.add('header--post');
}

Contact.afterEnterFunction = () => {}
