$('body').on('modal:opened', '#myAwesomeModal', function(evt, button){
    console.log(evt, button, this);
  });
  
  // Todos os elementos de modal
  $('body').on('modal:closed', '.ls-modal', function(evt){
    console.log(evt, this);
  });