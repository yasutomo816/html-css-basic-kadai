 $(window).on('load scroll',function(e) {
    if(e.type === 'load'){
        console.log('「loadイベントが発生しました」');
    }
    if(e.type === 'scroll'){
        console.log('「scrollイベントが発生しました」');
    }
});
