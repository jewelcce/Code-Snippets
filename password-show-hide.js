<script>

  $(function(){
  $('.hide_show').show();
  $('.hide_show span').addClass('show')
  
  $('.hide_show span').click(function(){
    if( $(this).hasClass('show') ) {
      $(this).text('Hide');
      $('input[name="password"]').attr('type','text');
      $(this).removeClass('show');
    } else {
       $(this).text('Show');
       $('input[name="password"]').attr('type','password');
       $(this).addClass('show');
    }
  });
  
  $('form button[type="submit"]').on('click', function(){
    $('.hide_show span').text('Show').addClass('show');
    $('.hide_show').parent().find('input[name="password"]').attr('type','password');
  }); 
});

</script>

/*
<span class="hide_show">
  <span class="btn btn-default">Show</span>
</span>
*
// html
