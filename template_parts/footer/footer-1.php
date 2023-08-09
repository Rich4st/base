<footer class="footer p-10 bg-neutral text-neutral-content lg:px-32">
  <div class="flex items-center">
    <a class="bg-[#ff9900] p-2 rounded-full" href="<?php echo home_url() ?>">
      <svg class="text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 313">
        <path fill="#4B608E" d="m246.242 88.034l-67.755 45.68c-14.259-20.006-44.57-22.517-62.096-5.196c-16.55 16.354-14.891 43.847 3.427 58.263c20 15.739 50.843 8.898 61.927-13.679L256 207.606c-12.952 30.076-40.486 64.97-101.181 67.61l3.017 37.056c-50.904-7.363-97.472-39.922-113.774-88.52l-31.504 21.014C2.89 221.06-.6 194.965 3.376 169.7c3.844-24.43 14.655-46.338 31.09-65.035L0 88.651c16.182-18.902 35.398-34.42 58.888-43.999c24.073-9.818 51.158-12.933 76.76-7.597L132.632 0c50.66 7.33 97.16 39.675 113.61 88.034" />
      </svg>
    </a>
    <a class="normal-case text-xl font-meshed text-[#ff9900] underline" href="<?php echo home_url() ?>">Capalot</a>
  </div>
  <div>
    <span class="footer-title">Tag</span>
    <ul class="grid grid-flow-col gap-4">
      <li>
        <a href="">@tag1</a>
      </li>
      <li>
        <a href="">@tag2</a>
      </li>
      <li>
        <a href="">@tag3</a>
      </li>
      <li>
        <a href="">@tag4</a>
      </li>
    </ul>
  </div>
  <div>
    <span class="footer-title">Social</span>
    <div class="grid grid-flow-col gap-4">
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
          <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
        </svg></a>
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
          <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
        </svg></a>
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
          <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
        </svg></a>
    </div>
  </div>
</footer>
<footer class="bg-[#2b3440] pb-4 text-center">
  <a class="text-[#ff9900] underline text-lg font-pop" href="<?php echo home_url() ?>">Blog at Wordpress.com</a>
</footer>

<?php wp_footer(); ?>
