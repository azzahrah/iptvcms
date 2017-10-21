format_lock = function (val, row) {
    if (parseInt(val, 10) === 1) {
        return "<span style=\'background:'black';color:'red';\'>Lock</span>";
    }
    return "";
};
format_yesno = function (val, row) {
    if (parseInt(val, 10) === 1) {
        return "<span style=\'background:'black';color:'red';\'>Yes</span>";
    }
    return "<span style=\'background:'black';color:'white';\'>No</span>";
};
format_activenonactive = function (val, row) {
    if (parseInt(val, 10) === 1) {
        return "<span style=\'background:'black';color:'red';\'>Active</span>";
    }
    return "<span style=\'background:'black';color:'white';\'>Nonactive</span>";
};

formatdate = function (date) {
    console.log(date);
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    var d = date.getDate();
    var h = date.getHours();
    var i = date.getMinutes();
    var s = date.getSeconds();
    var str= y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
    str += (h < 10 ? ('0' + h) : h);
    str += (i < 10 ? ('0' +i) : i);
    str += (s < 10 ? ('0' + s) : s);
    return str;
    
}
pasedate = function (s) {
    if (!s || s == undefined)
        return new Date();
    console.log(s)
    var obj = s.split(' ');
    console.log(obj);
    var tt = obj[1].split(':');
    
    var ss = (s.split('-'));
    
    var y = parseInt(ss[0], 10);
    var m = parseInt(ss[1], 10);
    var d = parseInt(ss[2], 10);

    var h = parseInt(tt[0], 10);
    var i = parseInt(tt[1], 10);
    var s = parseInt(tt[2], 10);

    if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
        return new Date(y, m - 1, d, h, i, s);
    } else {
        return new Date();
    }
}