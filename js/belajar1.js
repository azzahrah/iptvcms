var nama;
var alamat;

var profile = {
    nama: '',
    alamat: ''
};

console.log(profile.nama);

startMotor = function () {

};
function startMotor() {

}



function Motor() {
    var T = this;
    var arr = [];
    var objxx;
    T.start = function (param1) {

        if (typeof param1 === 'function') {

        } else if (typeof param1 === 'object') {

        }
        if (objxx === undefined) {
            console.log('undefined');
        } else {
            console.log('not undefined');
        }
        for (var i = 0; i < 100; i++) {
            arr[i] = i * 2;
        }
        if (arr) {
            for (var i in arr) {
                console.log(arr[i]);
            }
        }
        var test = 'ok';
        switch (test) {
            case 'ok':
                break;
            case 'no':
                break;
        }
    };
    T.stop = function () {

    };
}

var megapro = new Motor();
megapro.start('test');
var vehicle = {

};
var app = {};
app.start = function () {
    //
};
app.stop=function(){
    
};

var data=[];

data.push({
    nama:'Joko',
    alamat:'Surabaya'
});

data.push({
    pekerjaan:'Programmer',
    status:'Menikah'
});

var i=data[0];
var j=data[1];
console.log(i.nama);
console.log(j.pekerjaan);
console.log(j.status);

