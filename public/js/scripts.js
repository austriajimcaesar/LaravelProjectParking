var a;
var b;
var parked;

$(document).ready(function() {
    number_parked();
    pull_data();
    pull_data1();

});
$(document).ready(function() {
    $.ajax({
        url: "http://localhost/parking/customer",
        dataType: 'json',
        type: 'POST',
        data: '',
        success: function(data) {
            a = data.payload;
            var str_html = '';
            console.log(a);
            for (var i = 0; i < a.length; i++) {
                console.log(a[i].custId);
                // var fullname = a[i].custLname + ', ' + a[i].custFname + ', ' + a[i].custMname;
                var vModel = a[i].vModel;
                var vMaker = a[i].vMaker;
                var vPlatenum = a[i].vPlatenum;

            }

            str_html += '<p> ' + a.length + '</p>'
            $('#parked').html(str_html);
        }
    });


});

function pull_data() {
    $.ajax({
        url: "http://localhost/parking/customer",
        dataType: 'json',
        type: 'POST',
        data: '',
        success: function(data) {
            a = data.payload;
            var str_html = '';
            console.log(a);
            for (var i = 0; i < a.length; i++) {
                console.log(a[i].custId);
                // var fullname = a[i].custLname + ', ' + a[i].custFname + ', ' + a[i].custMname;
                var vModel = a[i].vModel;
                var vMaker = a[i].vMaker;
                var vPlatenum = a[i].vPlatenum;

                str_html += '<tr>';
                str_html += '<td>' + a[i].custId + '</td>';
                // str_html+='<td>'+fullname+'</td>';
                str_html += '<td>' + vPlatenum + '</td>';
                str_html += '<td>' + vMaker + '</td>';
                str_html += '<td>' + vModel + '</td>';
                str_html += '<td><button  class="btn Green modal-trigger" data-target="modal1" onclick="show_record(' + i + ')">View</button>	<button class="btn red" onclick="delete_record(' + i + ')">Delete</button></td>';
                str_html += '</tr>';
            }
            $('#records').html(str_html);
            parked = a.length;
        }
    });
}







function show_record(indx) {
    $('#custId').val(a[indx].custId);
    // $('#custFname').val(a[indx].custFname);
    // $('#custLname').val(a[indx].custLname);
    // $('#custMname').val(a[indx].custMname);
    $('#vModel').val(a[indx].vModel);
    $('#vMaker').val(a[indx].vMaker);
    $('#vPlatenum').val(a[indx].vPlatenum);
}


function delete_record(indx) {
    var recno = a[indx].custId;
    $.ajax({
        url: 'http://localhost/parking/deletecustomer',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ 'recno': recno }),
        success: function(data) {
            pull_data();
        }
    });
}

function add_record() {
    // var transNum = $('#transNum').val();
    var vModel = $('#vModel').val();
    var vMaker = $('#vMaker').val();
    var vPlatenum = $('#vPlatenum').val();
    location.replace("http://localhost/parking1/www/index.html")
    console.log(vPlatenum, vMaker, vModel);
    $.ajax({
        url: "http://localhost/parking/addcustomer",
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ vPlatenum, vMaker, vModel }),
        success: function(data) {
            console.log(data);
            pull_data();

        }
    });
}

function edit_record() {
    // var custFname = $('#custFname').val();
    // var custLname = $('#custLname').val();
    // var custMname = $('#custMname').val();
    var vModel = $('#vModel').val();
    var vMaker = $('#vMaker').val();
    var vPlatenum = $('#vPlatenum').val();
    var custId = $('#custId').val();

    console.log( /*custFname, custLname, custMname,*/ vPlatenum, vMaker, vModel);
    $.ajax({
        url: "http://localhost/parking/editcustomer",
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ /*custFname, custLname, custMname,*/ vPlatenum, vMaker, vModel, custId }),
        success: function(data) {
            console.log(data);
            pull_data();
            location.replace("http://localhost/parking1/www/Vehicles.html")

        }
    });
}

function date_exit(indx) {
    var id = b[indx].recno;
    $.ajax({
        url: "http://localhost/parking/dateexit",
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ id }),
        success: function(data) {
            console.log(data);
            pull_data1();

        }
    });
}



function pull_data1() {
    $.ajax({
        url: "http://localhost/parking/transaction",
        dataType: 'json',
        type: 'POST',
        data: '',
        success: function(data) {
            b = data.payload;
            var str_html = '';
            console.log(b);
            for (var i = 0; i < b.length; i++) {
                console.log(b[i].recno);

                str_html += '<tr>';
                str_html += '<td>' + b[i].recno + '</td>';
                // str_html += '<td>' + b[i].transNum + '</td>';
                str_html += '<td>' + b[i].vPlatenum + '</td>';
                str_html += '<td>' + b[i].vArrival + '</td>';




                if (b[i].trans_date == null) {
                    str_html += '<td>' + '----' + '</td>';
                } else {

                    str_html += '<td>' + b[i].trans_date + '</td>';

                }

                if (b[i].parkTamount == null) {
                    str_html += '<td>' + '----' + '</td>';
                } else {
                    str_html += '<td>' + b[i].parkTamount + '</td>';
                }

                if (b[i].trans_date == null) {
                    str_html += '<td><button  class="btn Green" data-target="modal2" onclick="date_exit(' + i + ')">Out</button></td>';


                } else {
                    str_html += '<td><button  class="btn red ligthen-2" data-target="modal2" onclick="gethours(' + i + ')" id="try">Billing</button></td>';
                }


                str_html += '</tr>';
            }
            $('#records1').html(str_html);

        }
    });
}




function gethours(indx) {
    $("#try").prop("disabled", true);
    var id = b[indx].recno;
    var pasok = b[indx].vArrival;
    var labas = b[indx].trans_date;
    var pay;
    var date1 = new Date(pasok);
    var date2 = new Date(labas);

    var hoursbefore = Math.abs(date1 - date2) / (60 * 60 * 1000);
    var hours = Math.round(hoursbefore);
    console.log(hours);
    if (hours < 1) {
        pay = 30;
    } else {
        pay = hours * 30;
    }


    console.log(pay);
    var Difference_In_Time = date2.getTime() - date1.getTime();
    $.ajax({
        url: "http://localhost/parking/fee",
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ pay, id, labas }),
        success: function(data) {
            console.log(data);
            pull_data1();
        }
    });
}


function edit_transaction() {

    var vDeparture = $('#vDeparture').val();



    console.log(vDeparture);
    $.ajax({
        url: "http://localhost/parking/edittransaction",
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ 'vDeparture': vDeparture }),
        success: function(data) {
            console.log(data);
            pull_data1();
        }
    });
}



function register() {
    var uname = $('#adUname').val();
    var pword = $('#adPword').val();
    var fname = $('#adminFname').val();
    var lname = $('#adminLname').val();



    console.log(uname, pword, fname, lname);
    $.ajax({
        url: 'http://localhost/parking/register',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({ uname, pword, fname, lname, }),
        success: function(data) {
            console.log(data);
            location.replace('http://localhost/parking1/www/loginParking.html');
        }
    });
}


function show_tran(indx) {

    // $('#custFname').val(a[indx].custFname);
    // $('#custLname').val(a[indx].custLname);
    // $('#custMname').val(a[indx].custMname);
    // $('#transNum1').val(b[indx].transNum);
    $('#vPlatenum1').val(b[indx].vPlatenum);

}

function logout() {
    localStorage.setItem("lname", "");
    location.replace('http://localhost/parking1/www/loginParking.html');
}


function number_parked() {
    $('#parked').text(parked);

}

//function clear_input(){
//	$('#custFname').val('');
//	$('#custLname').val('');
//	$('#custMname').val('');
//	$('#vType').val('');
//	$('#vModel').val('');
//	$('#vMaker').val('');
//	$('#vpal').val('');
//$('#vPlatenum').val('');	}