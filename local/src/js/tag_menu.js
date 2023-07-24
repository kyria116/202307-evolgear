function slider_ul_list(id) {
    let obj = $('#' + id);
    let menu_box = obj.find('.item_menu_Box').width();
    let total_width = obj.find('ul').width();
    let menu_li = obj.find('li');
    let active = obj.find('.active').index();
    let active_offset = obj.find('li.active').offset().left;
    let move = (winW - menu_box) / 2;

    let sum = 0, i = 0, sclEnd;
    let pos = new Array();
    let sumArray = new Array();
    menu_li.each(function () {
        pos[i] = $(this).offset().left;
        sum = pos[i] - move;
        if (sum < total_width - menu_box) sclEnd = i;
        sumArray[i] = sum;
        i++;
    });
    //判斷是否有箭頭 
    $window.on('resize', function () {
        total_width = obj.find('ul').width();
        menu_box = obj.find('.item_menu_Box').width();
        if (total_width > menu_box) {
            obj.addClass('open_flexslider');
            obj.find('.item_menu_Box').scrollLeft(sumArray[active]);
        } else {
            obj.removeClass('open_flexslider');
        }
    }).resize();
    $('#' + id + ' .rtbn').on('click', function () {
        if (sumArray[active] < total_width - menu_box) {
            active++;
            obj.find('.item_menu_Box').stop().animate({ scrollLeft: sumArray[active] }, 600)
        }
    })
    $('#' + id + ' .ltbn').on('click', function () {
        if (sumArray[active] > 0 && active > 0) {
            active--;
            obj.find('.item_menu_Box').stop().animate({ scrollLeft: sumArray[active] }, 600)
        }
    })
    //判斷是否第一個或是最後一個            
    $('#' + id + ' .item_menu_Box').on('scroll', function () {
        let newscroll = obj.find('.item_menu_Box').scrollLeft();
        if (newscroll <= 0) {
            obj.addClass('mleft');
            obj.find('.ltbn').addClass('nopage');
        } else if (newscroll >= sumArray[sclEnd]) {
            obj.addClass('mright');
            obj.find('.rtbn').addClass('nopage');
        } else {
            obj.removeClass('mleft mright');
            obj.find('.arrow').removeClass('nopage');
        }
    }).scroll();
}