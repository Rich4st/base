<?php
/**
 * @description 底部固定footer
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/footer-fixed.jpg?raw=true
 * 
 */
?>
<ul id="fixed-footer" class="flex items-center justify-between bg-black px-4 fixed z-40 bottom-0 w-screen 
  text-white animate__animated animate__fadeInUp duration-200">
  <li id="to-top" class="flex flex-col justify-center items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
      <path fill="currentColor" d="m12 4.836l-6.207 6.207l1.414 1.414L12 7.664l4.793 4.793l1.414-1.414L12 4.836Zm0 5.65l-6.207 6.207l1.414 1.414L12 13.314l4.793 4.793l1.414-1.414L12 10.486Z" />
    </svg>
    <p>Top</p>
  </li>
  <li class="flex flex-col justify-center items-center">
    <button class="hover:bg-[#00c22d] bg-[#439539] px-8 py-2 rounded-sm font-semibold text-sm text-white">Sign Up</button>
  </li>
  <li>
    <?php get_template_part('template_parts/header/components/drawer', '', array(
      'with-close' => true,
      'drawer-class' => 'w-screen',
      'menu-class' => 'flex flex-col items-center justify-center font-meshed text-xl'
    )) ?>
    <p>Menu</p>
  </li>
</ul>

<script>
  document.onreadystatechange = function() {
    if (document.readyState == "complete") {
      const fixedFooter = document.querySelector('#fixed-footer')
      const toTop = document.querySelector('#to-top')

      window.addEventListener('scroll', function() {
        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop
        if (scrollTop > 50) {
          fixedFooter.classList.remove('hidden')
        } else {
          fixedFooter.classList.add('hidden')
        }
      })

      toTop.addEventListener('click', () => {
        // scroll to top
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        })
      })
    }
  }
</script>
