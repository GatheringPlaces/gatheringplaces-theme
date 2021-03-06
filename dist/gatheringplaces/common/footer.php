
  </main>
  <script>
    (function(){
      if (document.querySelector('body').classList.contains('home')){
        var collapse_control = document.querySelector('.collapse-section-control');
        var section_collapse = document.querySelector('.section-collapsible');
        var section_expand = document.querySelector('.section-expandable');
        var section_state;

        collapse_control.addEventListener('click', function(){
          console.log(section_collapse.getAttribute('aria-hidden'))
          section_state = (section_collapse.getAttribute('aria-hidden') === 'true' ? false : true );
          console.log(section_state)
          section_collapse.classList.toggle('section-collapsed');
          section_collapse.setAttribute('aria-hidden', section_state);
          section_expand.classList.toggle('section-expanded');
          this.classList.toggle('collapsed');
          this.setAttribute('aria-expanded', !section_state);
        })
      }
    })();

    (function(){
      var menu = document.getElementById('site-nav');
      var menu_control = document.getElementById('site-nav-control');

      //check if menu_control is visible or not and set aria attribute
      var menu_init = function(){
        if (menu_control.offsetParent == null){
          menu.setAttribute('aria-hidden', 'false');
        }
        else{
          menu.setAttribute('aria-hidden', 'true');
        }
      }

      //when window is resized clean up mobile nav
      var menu_window_resize = function(){
        if (menu_control.offsetParent == null){
          menu.setAttribute('aria-hidden', 'false');
          menu.classList.remove('open');
          menu_control.classList.add('open-site-nav');
          menu_control.classList.remove('close-site-nav');
        }
        else{
          menu.setAttribute('aria-hidden', 'true');
        }
      }

      //handling when the menu is open and closed
      var toggle_menu = function(){
        menu.classList.toggle('open');

        if (menu.getAttribute('aria-hidden') == 'false'){
          menu.setAttribute('aria-hidden', 'true');
        }
        else{
          menu.setAttribute('aria-hidden', 'false');
        }

        menu_control.classList.toggle('open-site-nav');
        menu_control.classList.toggle('close-site-nav');

        if (menu_control.getAttribute('aria-expanded') == 'false'){
          menu_control.setAttribute('aria-expanded', 'true');
        }
        else{
          menu_control.setAttribute('aria-expanded', 'true');
        }
      }

      //initialization
      menu_init();

      //resize
      window.addEventListener('resize', menu_window_resize, false);

      //click
      menu_control.onclick = function(event){
        toggle_menu();
      }
    })();

  </script>
</body>
</html>
