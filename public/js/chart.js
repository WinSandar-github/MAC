function getStudentChart(){
    var xValues=[];
    var yValues = [];
    var barColors = [];
    var studentList=[];
    var type=$("#selected_type").val();
    $.ajax({
        url: BACKEND_URL+"/course",
        type: 'get',
        data:"",
        success: function(data){
            $.ajax({
                url: BACKEND_URL+"/chart_filter/"+type,
                type: 'get',
                data:"",
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
                    new Chart("myChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues,
                                borderWidth:1 
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

 