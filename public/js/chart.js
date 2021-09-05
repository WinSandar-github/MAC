var studentChart=null;
function getStudentChart(date_clear){
    if(studentChart!=null){
        studentChart.destroy();
    }
    if(date_clear==true){
        document.getElementById("dash_to_date").value = "";
        document.getElementById("dash_from_date").value = "";
    }    
    var xValues=[];
    var yValues = [];
    var barColors = [];
    var studentList=[];
    var type=$("#selected_type").val();
    var from=$("input[name=dash_from_date]").val();
    var to=$("input[name=dash_to_date]").val();
    var send_data=new FormData();
    send_data.append('type',type);
    send_data.append('from',from);
    send_data.append('to',to);
    $.ajax({
        url: BACKEND_URL+"/course",
        type: 'get',
        data:"",
        success: function(data){
            $.ajax({
                url: BACKEND_URL+"/chart_filter",
                type: 'post',
                data: send_data,
                contentType: false,
                processData: false,
                success: function(student){
                    student.data.forEach(s=>{
                        studentList.push(s);
                    });
                
                    data.data.forEach(element => {
                        xValues.push(element.code);
                        const randomColor = Math.floor(Math.random()*16777215).toString(16);
                        barColors.push('#'+randomColor);
                        if(type==1 || type==2){
                            let filter = studentList.filter(function (v) {
                                return v.form_type == element.id
                            });                           
                            yValues.push(filter.length);
                        }
                        else{
                            let filter = studentList.filter(function (v) {
                                return v.batch.course_id == element.id
                            });
                            yValues.push(filter.length);
                        }
                    });
                    studentChart=new Chart("studentChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues,
                                borderWidth:1 ,
                                barThickness: 20,
                            }]
                        },
                        options: {
                            legend: {display: false},
                            scales: {
                                yAxes: [{
                                    ticks: {
                                    beginAtZero: true
                                    }
                                }],
                            },
                            title: {
                                display: true,
                                text: "Students Chart By Course"
                            }
                        }
                    });
                }
            });
        }
        ,
        error:function (message){
            console.log(message);     
        }
    
    });
}

function getMentorChart(){

}
 