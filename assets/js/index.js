document.onreadystatechange = function () {
  if (document.readyState == "complete") {
    const menu = document.querySelector('#my-drawer')
    
    menu.addEventListener('change', function () {
      document.body.classList.toggle('overflow-hidden')

    })
    
  }
}

