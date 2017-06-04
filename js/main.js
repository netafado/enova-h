$(document).ready(function(){
  $('label[for="username-150"]').hide();
  $('#username-150').attr('placeholder', 'Usuário');
  $('#username-150').attr('style','margin-bottom: 10px!important');
  $('.um-login > div > form label').hide();
  $('#user_password-150').attr('placeholder', 'Senha');
  $('.um-field-password_reset_text').hide();
  $('#s2id_uf_key').addClass('p-l-10');


  $('html[lang$=US] #username-150').attr('placeholder', 'Username');
  $('html[lang$=US] #user_password-150').attr('placeholder', 'Password');

  // gh
  $('html[lang$=US] #select2-chosen-1').html('select2-chosen-2');
  console.log('select2-chosen-2');
  $('html[lang$=ES] #username-150').attr('placeholder', 'Usuario');
  $('html[lang$=ES] #user_password-150').attr('placeholder', 'Contraseña');

  j('.carrousel-conteudo').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: false,
    autoplaySpeed: 1000,
    draggable: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
  j('.carrousel-conteudo1').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 1000,
    draggable: true
  });
});