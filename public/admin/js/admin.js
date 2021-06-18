function myFunction(id=null) {
    //document.getElementById("ID").innerHTML = id;
    $.ajax({
        type: "GET",
        cache: false,
        url: '/lab-04/api/' + id,
        success: function (res) {
            var data =  JSON.parse(res);
            console.log(data);
            $.each(data, function() {
                var html = '';
                    html += '<table class="table table-bordered" id="dataTable_api" width="100%" cellspacing="0"">';
                    html += '<thead>';
                    html += '<tr>';
                       html += '<th>';
                            html += 'ID';
                        html += '</th>';
                        html += '<th>';
                            html += 'Username';
                       html += '</th>';
                       html += '<th>';
                            html += 'FullName';
                       html += '</th>';
                       html += '<th>';
                            html += 'Email';
                       html += '</th>';
                       html += '<th>';
                            html += 'Level';
                       html += '</th>';
                       html += '<th>';
                            html += 'Gender';
                       html += '</th>';
                       html += '<th>';
                            html += 'RegisterDay';
                       html += '</th>';
                    html += '</thead>';
                    html += '<tfoot>';
                    html += '<tr>';
                       html += '<th>';
                            html += 'ID';
                        html += '</th>';
                        html += '<th>';
                            html += 'Username';
                       html += '</th>';
                       html += '<th>';
                            html += 'FullName';
                       html += '</th>';
                       html += '<th>';
                            html += 'Email';
                       html += '</th>';
                       html += '<th>';
                            html += 'Level';
                       html += '</th>';
                       html += '<th>';
                            html += 'Gender';
                       html += '</th>';
                       html += '<th>';
                            html += 'RegisterDay';
                       html += '</th>';
                    html += '</tr>';
                    html += '</tfoot>';
                html +=  '<tr>';
                html +=  '<td>';
                    html += '<input value="'
                        html +=  data[0]['IdUser'];
                    html += '" readonly></input>'
                html +=  '</td>';
                html +=  '<td>';
                    html +=  '<p id="ID">';
                   html += '<input value="'
                        html += data[0]['Username'];
                   html += '"readonly></input>'
                    html +=  '</p>';
                html +=  '</td>';
                html +=  '<td>';
                    html += '<input value="' 
                        html +=  data[0]['FullName'];
                    html += '"></input>'
                   
                html +=  '</td>';
                html +=  '<td>';
                    html += '<input value="'
                        html +=  data[0]['Email'];
                    html += '"></input>'
                html +=  '</td>';
                html +=  '<td>';
                    html += '<input value="'
                        html +=  data[0]['Level'];
                    html += '"></input>'
                html +=  '</td>';
                html +=  '<td>';
                    html += '<input value="'
                        html +=  data[0]['Gender'];
                    html += '"></input>'
                html +=  '</td>';
                html +=  '<td>';
                    html +=  data[0]['RegisterDay'];
                html +=  '</td>';
            html +=  '</tr>';
            html +='</table>';
            html +='</div></div>';
            html +='<button type="submit" id="btn_load" name="btnadd" class="btn btn-primary">UPDATE</button>';
            $('#dataTable_api').html(html);
        });
        }
    })
  }

$(document).ready(function() {
    $("#form_api").hide();
    $("#dataTable_api").hide();
    $('#btn_load').click(function () {
    method = document.getElementById("permission").value;
    switch (method) {
        case 'GET':
            $("#form_api").hide();
            $("#dataTable_api").show();
            $.ajax({
                type: "GET",
                cache: false,
                url: '/lab-04/api/',
                success: function (res) {
                    var data =  JSON.parse(res);
                    $.each(data, function(i) {
                        var html = '';
                        html += '<table class="table table-bordered" id="dataTable_api" width="100%" cellspacing="0"">';
                        html += '<thead>';
                        html += '<tr>';
                           html += '<th>';
                                html += 'ID';
                            html += '</th>';
                            html += '<th>';
                                html += 'Username';
                           html += '</th>';
                           html += '<th>';
                                html += 'FullName';
                           html += '</th>';
                           html += '<th>';
                                html += 'Email';
                           html += '</th>';
                           html += '<th>';
                                html += 'Level';
                           html += '</th>';
                           html += '<th>';
                                html += 'Gender';
                           html += '</th>';
                           html += '<th>';
                                html += 'RegisterDay';
                           html += '</th>';
                           html += '<th>';
                                html += 'Xem';
                           html += '</th>';
                           html += '<th>';
                                html += 'Xoa';
                           html += '</th>';
                        html += '</thead>';
                        html += '<tfoot>';
                        html += '<tr>';
                           html += '<th>';
                                html += 'ID';
                            html += '</th>';
                            html += '<th>';
                                html += 'Username';
                           html += '</th>';
                           html += '<th>';
                                html += 'FullName';
                           html += '</th>';
                           html += '<th>';
                                html += 'Email';
                           html += '</th>';
                           html += '<th>';
                                html += 'Level';
                           html += '</th>';
                           html += '<th>';
                                html += 'Gender';
                           html += '</th>';
                           html += '<th>';
                                html += 'RegisterDay';
                           html += '</th>';
                           html += '<th>';
                                html += 'Xem';
                            html += '</th>';
                            html += '<th>';
                                html += 'Xoa';
                           html += '</th>';
                        html += '</tr>';
                        html += '</tfoot>';
                         $.each(data[i], function(k,v) {
                                    html +=  '<tr>';
                                        html +=  '<td>';
                                            html +=  v['IdUser'];
                                        html +=  '</td>';
                                        html +=  '<td>';
                                            html +=  '<p id="ID">';
                                            html += v['Username'];
                                            html +=  '</p>';
                                        html +=  '</td>';
                                        html +=  '<td>';
                                            html +=  v['FullName'];
                                        html +=  '</td>';
                                        html +=  '<td>';
                                            html +=  v['Email'];
                                        html +=  '</td>';
                                        html +=  '<td>';
                                            html +=  v['Level'];
                                        html +=  '</td>';
                                        html +=  '<td>';
                                            html +=  v['Gender'];
                                        html +=  '</td>';
                                        html +=  '<td>';
                                            html +=  v['RegisterDay'];
                                        html +=  '</td>';
                                        html +=  '<td>';
                                        html += '<button class="btn btn-primary" type="button" onclick="myFunction('+v['IdUser']+')">' ;
                                        html +=  'xem';
                                        html +=  '</td>';
                                        html +=  '<td>';
                                        html +=  '</button>';
                                        html += '<button class="btn btn-danger" type="button" onclick="Delete_User('+v['IdUser']+')">' ;
                                        html +=  'xoa';
                                        html +=  '</button>';
                                    html +=  '</td>';
                                    html +=  '<tr>';
                                });
                                 
                                html +=  '</table>';
                                 
                                $('#dataTable_api').html(html);
                      });
                }
            });
            break;
        case 'POST':
            $("#form_api").show();
            $("#dataTable_api").hide();
            break;
        case 'PUT':
            
            break;
        case 'DELETE':
        
            break;
        default:
            break;
    }
    })
    $('#btnadd').click(function (){
        var FullName = $('#FullName').val();
        var Username = $('#Username').val();
        var Password = $('#Password').val();
        var Email = $('#exampleInputEmail1').val();
        var Gender = $('.form-check-input:checked').val();
        var birthday = $('#birthday').val();
        var permission = $('#permission_api').val();
        var level = $('#level').val();
        if(FullName=='' || Username=='' || Password=='' || Email=='' || Gender=='' || birthday=='' || permission=='' || level==''){
            alert('khong duoc bo trong');
        }
        else{
            $.ajax({
            type: "POST",
            dataType:"text",
            url: '/lab-04/api',
            data : {
                hovaten:FullName,
                username:Username,
                password:Password,
                email:Email,
                gender:Gender,
                permission:permission,
                level:level,
                birthday:birthday,
            },
            success: function (res) {
                var data =  JSON.parse(res);
                console.log(data);
                $.each(data, function() {
                    alert(data['error']);
                 });
                
            }
        });
        }
        return false;
    }); 
});
function Delete_User(IdUser=null) {
    $.ajax({
        type: "DELETE",
        cache: false,
        url: '/lab-04/api/' + IdUser,
        success: function (res) {
            var data =  JSON.parse(res);
            console.log(data);
            $.each(data, function() {
                alert(data['status']);
        });
        }
    })
}

