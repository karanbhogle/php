
       UIkit.util.on('#js-modal-dialog', 'click', function (e) {
           e.preventDefault();
           e.target.blur();
           UIkit.modal.dialog('<p class="uk-modal-body">UIkit dialog!</p>');
       });

       UIkit.util.on('#js-modal-alert', 'click', function (e) {
           e.preventDefault();
           e.target.blur();
           UIkit.modal.alert('UIkit alert!').then(function () {
               console.log('Alert closed.')
           });
       });

       UIkit.util.on('#js-modal-confirm', 'click', function (e) {
           e.preventDefault();
           e.target.blur();
           UIkit.modal.confirm('UIkit confirm!').then(function () {
               console.log('Confirmed.')
           }, function () {
               console.log('Rejected.')
           });
       });

UIkit.util.on('#js-modal-prompt', 'click', function (e) {
    e.preventDefault();
    e.target.blur();
    UIkit.modal.prompt('Name:', 'Your name').then(function (name) {
        console.log('Prompted:', name)
    });
});
