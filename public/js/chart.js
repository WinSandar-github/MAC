var studentChart=null;
function getStudentChart(){
    if(studentChart!=null){
        studentChart.destroy();
    }   
    var xValues=[];
    var yValues = [];
    var barColors = [];
    var studentList=[];
    var current_year=new Date().getFullYear();
    var year=$("#selected_year").val();
    if(year==null || year==undefined || year==""){
        year=current_year;
    }
    var send_data=new FormData();
    send_data.append('year',year);
    $.ajax({
        url: BACKEND_URL+"/batch",
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
                        xValues.push(element.name);
                        const randomColor = Math.floor(Math.random()*16777215).toString(16);
                        barColors.push('#'+randomColor);
                        let filter = studentList.filter(function (v) {
                            return v.batch.id == element.id
                        });
                        yValues.push(filter.length);
                    });
                    studentChart=new Chart("studentAppChart", {
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
                                text: "Students Chart By Batch"
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

var studentRegChart=null;
function getStudentRegChart(){
    if(studentChart!=null){
        studentChart.destroy();
    }   
    var xValues=[];
    var yValues = [];
    var barColors = [];
    var studentList=[];
    var current_year=new Date().getFullYear();
    var year=$("#selected_year").val();
    if(year==null || year==undefined || year==""){
        year=current_year;
    }
    var send_data=new FormData();
    send_data.append('year',year);
    $.ajax({
        url: BACKEND_URL+"/batch",
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
                        xValues.push(element.name);
                        const randomColor = Math.floor(Math.random()*16777215).toString(16);
                        barColors.push('#'+randomColor);
                        let filter = studentList.filter(function (v) {
                            return v.batch.id == element.id
                        });
                        yValues.push(filter.length);
                    });
                    studentRegChart=new Chart("studentRegChart", {
                        type: "pie",
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
                                text: "Students Chart By Batch"
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

function drawChart() {
    var mac_count=0;
    var selfStudy_count=0;
    var privateSchool_count=0;
    var current_year=new Date().getFullYear();
    var year=$("#selected_year").val();
    if(year==null || year==undefined || year==""){
        year=current_year;
    }
    var send_data=new FormData();
    send_data.append('year',year);
    $.ajax({
        url: BACKEND_URL+"/reg_chart_filter",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function(student){
            student.data.forEach(s=>{
                if(s.type==0) selfStudy_count++;
                else if(s.type==1) privateSchool_count++;
                else if(s.type==2) mac_count++;
            });
            var data = google.visualization.arrayToDataTable([
                ['Type', 'Student Count'],
                ['MAC', mac_count],
                ['Self Study',selfStudy_count],
                ['Private School', privateSchool_count]
              ]);
              // Optional; add a title and set the width and height of the chart
            var options = {'title':'Student Registration', 'width':450, 'height':250};
        
            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('studentRegChart'));
            chart.draw(data, options);
        }
    })
  
  
    
  }

function loadYear(){     
    var select = document.getElementById("selected_year"); 
    var year=2010;
    var current_year=new Date().getFullYear();
    var year_diff=current_year-year;
    for (let index = 0; index <= year_diff; index++) {
        var option = document.createElement('option');
        option.text = year+index;
        option.value = year+index;    
        //if(option.value==current_year){
        //}
        select.add(option, 0);
    }        
    // console.log(year_diff);
     select.selectedIndex =0;
}
 