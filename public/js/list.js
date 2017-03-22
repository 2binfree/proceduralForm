/**
 * Created by ubuntu on 06/03/17.
 */
$(document).ready(function() {
    $("form").submit(function ( event ) {
        let btn = $(this).find("button:focus");
        let id = btn.attr('data-id');
        if (false == confirm('Etes vous sûr de vouloir supprimer cet utilisateur ?')) {
            event.preventDefault();
            return false;
        }
    });
});