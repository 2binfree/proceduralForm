/**
 * Created by ubuntu on 06/03/17.
 */
$(document).ready(function() {
  $("form").submit(function ( event ) {
    let btn = $(this).find("button:focus");
    let id = btn.attr('id').split('_')[1];
    let action = btn.attr('id').split('_')[0];
    $('#userId').val(id);
    if (action == "removeUser") {
      if (false == confirm('Etes vous sûr de vouloir supprimer cet utilisateur ?')) {
        event.preventDefault();
        return false;
      }
    }
  });
});