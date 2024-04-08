$(document).on('click keydown', (e) => {
    if(e.type === 'click'){
        $('div').text('クリックしました！');
    }
});