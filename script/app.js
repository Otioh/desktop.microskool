




var Current=window.location.hash.substr(1);
let landUrl=window.location.hash;

if(sessionStorage.getItem('url')){
CheckSession();
}else{
    Install();
}

window.addEventListener('hashchange', function(){

var Current= window.location.hash;
 let address = Current;
 Route(address);



});






setInterval(() => {
    openAds();
}, 240000);

function openAds() {
    document.getElementById('ads').showModal(); 
}



function StartLoader(){

document.getElementById('loader').showModal();

}
function StopLoader(){
    setTimeout(() => {
        
    document.getElementById('loader').close();
    
    }, 1000);

    }

function SignUp() {
    
var firstName, MiddleName, Surname, Matric, Department, Faculty, Level, phone, campus, Password, Type,Day,Month,Year,Email;
firstName=document.getElementById('firstname').value;
MiddleName=document.getElementById('middlename').value;
Surname=document.getElementById('surname').value;
Department=document.getElementById('department').value;
campus=document.getElementById('campus').value;
Faculty=document.getElementById('faculty').value;
Level=document.getElementById('level').value;
Password=document.getElementById('password').value;
Matric=document.getElementById('matric').value;
phone=document.getElementById('phone').value;
Level=document.getElementById('level').value;
Type=document.getElementById('type').value;
Day=document.getElementById('day').value;
Month=document.getElementById('month').value;
Year=document.getElementById('year').value;
Email=document.getElementById('email').value;

if(firstName=="" || MiddleName=="" || Surname=="" || Matric=="" || Department=="Department.." || Faculty=="Faculty.." || Level=="Level.." || Type=="Account Type.." || campus=="Campus.." || Day=="Day of Birth.."|| Month=="Month of Birth.." || Year=="Year of Birth.."|| Email==""|| Password==""){
    openAlert('All Fields are required', 'Required Field', 'alert-warning');
   
}else{
    StartLoader();
$.get('server/signup.php?firstname='+firstName+'&&surname='+Surname+'&&middlename='+MiddleName+'&&phone='+phone+'&&campus='+campus+'&&email='+Email+'&&faculty='+Faculty+'&&department='+Department+'&&reg='+Matric+'&&password='+Password+'&&type='+Type+'&&day='+Day+'&&year='+Year, function(data){
        
    
   
    StopLoader();
    openAlert(data, 'Message', 'alert-light');



});
}

    
}

function Login() {
    StartLoader();
var  Password, Email;

Password=document.getElementById('password').value;
Email=document.getElementById('email').value;

if(Password=="" || Email==""){
    openAlert('All Fields are required', 'Required Field', 'alert-warning');
    
    StopLoader();
}else{
$.get('server/login.php?email='+Email+'&&password='+Password, function(data){
        
    if(data=="success"){
        saveValue("email", Email);
        changeInterface('dashboard');
        CheckSession();
        StopLoader();
      
    }else{
   
    StopLoader();
    openAlert(data, 'Message', 'alert-warning');
    }


});

}

    
}


function openAlert(message, title, type) {
    document.getElementById('message').innerHTML=message;
    document.getElementById('alertTitle').innerHTML=title;
    document.getElementById('message').classList.remove('alert-danger');
    document.getElementById('message').classList.remove('alert-light');
    document.getElementById('message').classList.remove('alert-success');
    document.getElementById('message').classList.remove('alert-warning');
    document.getElementById('message').classList.add(type);
    document.getElementById('alert').showModal();
    closeAlert();
}

function closeAlert() {
    setTimeout(() => {
        document.getElementById('alert').close();
    }, 4000);
    
}





function changeInterface(params) {
    now=window.location.hash;
    $.get(params+'.html', function(data){
        
      
        document.getElementById('holder').innerHTML=data;
        window.history.pushState({}, null, '#/'+params);
        Name('3000');


    });
    

}

function saveValue(id, val){
     
    localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
} 

function getSavedValue  (v){
    if (!localStorage.getItem(v)) {
        return "";// You can change this to your defualt value. 
    }
    return localStorage.getItem(v);
}

function Name(params) {
    setTimeout(() => {
        var name = getSavedValue('email');
    document.getElementById('logId').innerHTML=getSavedValue('email');
    document.getElementById('dept').innerHTML=getSavedValue('department');
    }, params);
    
    }

function CheckSession() {
    if(getSavedValue('email')==""){
        openAlert('No Session, please login', 'Sesssion Error');
        changeInterface('login');
    }else{
     
        changeInterface('dashboard');
        if(landUrl){
            window.history.pushState({}, null, landUrl);
            Route(landUrl);
        }
       Profile();
       AllCourse();
        Name('12000'); 
    
    }
}





function Profile() {
   
    $.get('server/profile.php?email='+getSavedValue('email'), function(data){
        
        var obj = JSON.parse(data);
      var  myName= obj.fullname;

      var myDepartment=obj.department;
      var myFaculty=obj.faculty;
      var myLevel=obj.level;
      var myMatric=obj.code;
      var myImage=obj.image;
      var myPhone=obj.phone;
      var myDob=obj.dob;
      var myMob=obj.mob;
      var myYob=obj.yob;
    saveValue('fullname',myName);

    saveValue('department',myDepartment);

    saveValue('faculty',myFaculty);

    saveValue('level',myLevel);

    saveValue('matric',myMatric);
    saveValue('image',myImage);
    saveValue('phone',myPhone);
    saveValue('dob',myDob);
    saveValue('mob',myMob);
    saveValue('yob',myYob);


    });
    

   


}





function Open(params) {


 
StartLoader();
   if(params=="lectures"){
    $.get('server/lectures.php', function(data){
       
        document.getElementById('display').innerHTML=data;


loadData(params);

    });

   }else if(params=="editcourse"){
   
    $.get('server/courses.php?faculty='+getSavedValue('faculty')+'&&level='+getSavedValue('level')+'&&matric='+getSavedValue('matric'), function(data){
        
       
        document.getElementById('display').innerHTML=data;


loadData(params);


    });

   }
   
   
   else{
    $.get(params+'.html', function(data){
        
        document.getElementById('display').innerHTML=data;


loadData(params);


    });
    if(params=="forum"){
        loadMessage();

    }
}
Assignments();
LoadSchedule();
AllCourse();


}





function loadData(params) {
    setTimeout(() => {
        
if(params=="profile"){
    document.getElementById('name').innerHTML=getSavedValue('fullname');
    document.getElementById('proimage').src=getSavedValue('image');
    document.getElementById('matric').value=getSavedValue('matric');
    document.getElementById('phone').value=getSavedValue('phone');
    document.getElementById('email').value=getSavedValue('email');
    document.getElementById('dob').innerHTML=getSavedValue('dob');
    document.getElementById('faculty').innerHTML=getSavedValue('faculty');
    document.getElementById('faculties').innerHTML=getSavedValue('faculties');
    document.getElementById('department').innerHTML=getSavedValue('department');
    document.getElementById('departments').innerHTML=getSavedValue('departments');
    document.getElementById('level').innerHTML=getSavedValue('level');
    
 
}



    








    }, 50);
}
$.get('server/faculty.php', function(data){
        
 
    saveValue('faculties',data);
      
      
      });

      $.get('server/department.php', function(data){
        
 
        saveValue('departments',data);
          
          
          });
          $.get('server/campus.php', function(data){
        
 
            saveValue('campuses',data);
              
              
              });
            
function loadList(value) {
    setTimeout(() => {
        
        document.getElementById(value).innerHTML=getSavedValue(value);   
    }, 2000);
}


function Logout() {
    StartLoader();
saveValue('email','');
CheckSession();
    StopLoader();
}

function EditCourse() {
  
    $.get('server/courses.php?faculty='+getSavedValue('faculty')+'&&level='+getSavedValue('level')+'&&matric='+getSavedValue('matric'), function(data){

    
        document.getElementById('display').innerHTML=data;




    });
}

function Add(params) {

 if(document.getElementById('ccode').value==""){
    openAlert("Course code is empty", 'Required Field');
 }else{

    

    $.get('server/addcourse.php?code='+params+'&&matric='+getSavedValue('matric'), function(data){
        if(data=="create"){
            StartLoader();
          StopLoader();
            document.getElementById("newcourse").showModal();
            openAlert("Course does not exist, procees to create course", 'Error');
            loadList('faculties');
            loadList('departments');
            document.getElementById("c_code").value= document.getElementById("ccode").value;
        }else if(data=="success")
{  
        EditCourse();  
}else{
   
}


    });
}

}





function SaveCourse() {
    if(document.getElementById('c_code').value==""){
        openAlert("Course code not provided", 'Required Field');
    }else{
 StartLoader();
    $.get('server/savecourse.php?code='+document.getElementById("c_code").value+'&&title='+document.getElementById("c_title").value+'&&faculty='+document.getElementById("c_faculty").value+'&&department='+document.getElementById("c_department").value+'&&level='+document.getElementById("c_level").value, function(data){
        if(data=="create"){
            StartLoader();
          StopLoader();
            document.getElementById("newcourse").showModal();
            openAlert("Course does not exist, procees to create course" , 'Required Field');
            loadList('faculties');
            loadList('departments');
            document.getElementById("c_code").value= document.getElementById("ccode").value;
        }else if(data=="success")
{  
    document.getElementById("ccode").value= document.getElementById("c_code").value;
    document.getElementById("newcourse").close();

    StopLoader();
    openAlert("New Course Created, you can now Add", 'Required Field', 'alert-success');
}else{
    openAlert(data);
    StopLoader();
}


    });
    }
}

function ChangePassword() {
    if(document.getElementById('newpass').value=="" || document.getElementById('confirmpass').value=="" || document.getElementById('oldpass').value==""){
        openAlert("All Fields are required", 'Required Field', 'alert-warning');

    }else{

if(document.getElementById('newpass').value==document.getElementById('confirmpass').value){

    StartLoader();
       $.get('server/resetpassword.php?email='+getSavedValue("email")+'&&newpassword='+document.getElementById("newpass").value+'&&oldpassword='+document.getElementById("oldpass").value, function(data){
           if(data=="exist"){
             
             StopLoader();
              
               openAlert("New Password is same with existing Password", 'Error', 'alert-warning');
              
              
           }else if(data=="success")
   {  
      
   
       StopLoader();
       openAlert("Password Changed Successfully", 'Success Message', 'alert-success');
   }else if(data=="wrong")
   {  
      
   
       StopLoader();
       openAlert("Current Password is Wrong",  'Error', 'alert-warning');
   }
   
   else{
    StopLoader();
       openAlert(data, 'Message', 'alert-warning');
       
   }
   
   
       });
    }else{
        openAlert("Password Confirmation does not match!", 'Error', 'alert-warning');

    }
    }
   }

   
function UpdateProfile() {

       $.get('server/update.php?email='+getSavedValue("email")+'&&matric='+document.getElementById("matric").value+'&&faculty='+document.getElementById("facultyx").value+'&&department='+document.getElementById("departmentx").value+'&&level='+document.getElementById("levelx").value+'&&email2='+document.getElementById("email").value+'&&phone='+document.getElementById("phone").value, function(data){
         
           Profile();
 
       });
   
   }

  
   
function readURL() {
    var form_data = new FormData();
           
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file").files[0]);

    form_data.append("file", document.getElementById('file').files[0]);
    form_data.append("email", getSavedValue('email'));
 
    $.ajax({
     url:"server/upload.php",
     method:"POST",
     data: form_data,
     contentType: false,
     cache: false,
     processData: false,
     beforeSend:function(){
    StartLoader();
     },   
     success:function(data)
     {
        StopLoader();
         openAlert(data, 'Your Data', 'alert-light');
         Profile();
         Open('profile');
     }
    });       
   
  }
  

  function addFields(){
    // Number of inputs to create
    var number = document.getElementById("member").value;
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("container");
    // Clear previous contents of the container
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    for (i=0;i<number;i++){
        // Create an <input> element, set its type and name attributes
        var input = document.createElement("input");
        input.type = "text";
         input.list = "browser";
        input.name = "course"+i;
        input.style = "float:left;";
        input.placeholder="Course Code";
        container.appendChild(input);

        
''



        var selectcredit = document.createElement("select");
        selectcredit.name = "unit"+i;
        selectcredit.style = "float:left;";
        var option = document.createElement("option");
        option.value = "0";
        option.text="Credit Unit";
        selectcredit.appendChild(option);

        var option = document.createElement("option");
        option.value = "1";
        option.text="One";
        selectcredit.appendChild(option);
        container.appendChild(selectcredit);

        var option = document.createElement("option");
        option.value = "2";
        option.text="Two";
        selectcredit.appendChild(option);
        var option = document.createElement("option");
        option.value = "3";
        option.text="Three";
        selectcredit.appendChild(option);

        var selectgrade = document.createElement("select");
        selectgrade.name = "grade"+i;
        selectgrade.style = "float:left;";
        var option = document.createElement("option");
        option.value = "0";
        option.text="Grade";
        selectgrade.appendChild(option);

        var option = document.createElement("option");
        option.value = "5";
        option.text="A";
        selectgrade.appendChild(option);
        container.appendChild(selectgrade);

        var option = document.createElement("option");
        option.value = "4";
        option.text="B";
        selectgrade.appendChild(option);
        var option = document.createElement("option");
        option.value = "3";
        option.text="C";
        selectgrade.appendChild(option);

        var option = document.createElement("option");
        option.value = "2";
        option.text="D";
        selectgrade.appendChild(option);

        var option = document.createElement("option");
        option.value = "1";
        option.text="E";
        selectgrade.appendChild(option);

        var option = document.createElement("option");
        option.value = "0";
        option.text="F";
        selectgrade.appendChild(option);

        // Append a line break 
        container.appendChild(document.createElement("br"))
        container.appendChild(document.createElement("br"));
    }
}







function Recover() {
    if(document.getElementById('email').value=="" || document.getElementById('phone').value=="" || document.getElementById('matric').value==""){
        openAlert("All Fields are required", 'Required Field', 'alert-warning');

    }else{

    StartLoader();
       $.get('server/recover.php?email='+document.getElementById('email').value+'&&phone='+document.getElementById("phone").value+'&&matric='+document.getElementById("matric").value, function(data){
          
             
             StopLoader();
              
               openAlert(data, 'Your Data', 'alert-light');
              
      
    });
   }

}




function UploadLecture() {
    
    var form_data = new FormData();
           
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file").files[0]);

            form_data.append("file", document.getElementById('file').files[0]);
            form_data.append("email", getSavedValue('email'));
            form_data.append("topic", document.getElementById('topic').value);
            form_data.append("code", document.getElementById('code').value);
            form_data.append("summary", document.getElementById('summary').value);
            $.ajax({
             url:"server/uploadlecture.php",
             method:"POST",
             data: form_data,
             contentType: false,
             cache: false,
             processData: false,
             beforeSend:function(){
              StartLoader();
             },   
             success:function(data)
             {
                StopLoader();
                 openAlert(data, 'Your Data', 'alert-light');
                 document.getElementById('newlect').close();
             }
            });      
}
function searchReference(params) {
    
}

var mySearch="Erim Emmanuel Thanks";

if(mySearch.includes('Eri')){
   
}


function AllCourse() {
   setTimeout(() => {
    $.get('server/allcourse.php', function(data){
        
        document.getElementById('ulist').innerHTML=data;
         
        });  
   }, 1000);
   
    
}

function Assignments() {
    setTimeout(() => {
     $.get('server/assignment.php', function(data){
         
         document.getElementById('alist').innerHTML=data;
          
         });  
    }, 1000);
    
     
 }
 
function LoadCourses(params) {
    var obj = JSON.parse(getSavedValue('allcourse'));


    for (i=0;i<obj.length;i++){
      


    }
}

function loadMessage() {

setTimeout(() => {
     $.get('server/forum.php', function(data){
        
        document.getElementById('messagelist').innerHTML=data;
         
        }); 
    
}, 1000);

    
}


function popCourse() {
 setTimeout(() => {
    $.get('server/courselist.php', function(data){
        
        document.getElementById('browser').innerHTML=data;
         
        }); 
   
 }, 100);   
}

function newCourseDialog() {
    loadList('faculties');
    loadList('departments');  
    window.history.pushState({}, null, now+'*CreateNewCourse');
    setTimeout(() => {document.getElementById('newcourse').showModal();  

    

  



}, 100);
  
}

function UploadAssign() {
    var form_data = new FormData();
           
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file").files[0]);

            form_data.append("file", document.getElementById('file').files[0]);
            form_data.append("email", getSavedValue('email'));
            form_data.append("lecturer", document.getElementById('lecturer').value);
            form_data.append("code", document.getElementById('code').value);
            form_data.append("questions", document.getElementById('questions').value);
            form_data.append("deadline", document.getElementById('deadline').value);
            $.ajax({
             url:"server/uploadassignment.php",
             method:"POST",
             data: form_data,
             contentType: false,
             cache: false,
             processData: false,
             beforeSend:function(){
              StartLoader();
             },   
             success:function(data)
             {
                StopLoader();
                 openAlert(data, 'Message', 'alert-light');
                 document.getElementById('newlect').close();
             }
            });
}

function LoadSchedule() {
    setTimeout(() => {

        document.getElementById('deptitle').innerHTML=getSavedValue('department')+' '+getSavedValue('level');
        $.get('server/schedule.php?email='+getSavedValue('email'), function(data){
        
            document.getElementById('schedule').innerHTML=data;
             
            });    
    
    }, 1000);
}


function Install() {
    $.get('install.html', function(data){
        
   
        
        window.history.pushState({}, null, '#install');
        document.getElementById('holder').innerHTML=data;
        var start=1;
        setTimeout(() => {
        
            document.getElementById('installProgress').max='100';
            document.getElementById('installProgress').value=start;    
setInterval(() => {
    document.getElementById('percent').innerHTML=document.getElementById('installProgress').value;  
    document.getElementById('installProgress').value=start++;  
    if(document.getElementById('installProgress').value==100){
        document.getElementById('installText').innerHTML='Loading....';
    }
}, 200);

        
        }, 10000);
        
setTimeout(() => {
    CheckSession();
    

}, 35000);


    });
}

function Do(params) {
    setTimeout(() => {
        

        if(params=="ResetPassword")  {
            OpenPassword();
           
        }else if(params=="UploadProfileImage"){

UploadImage();
        }else if(params=="CreateNewCourse"){

            newCourseDialog();
                    }
                    else if(params=="NewAssignment"){

                        OpenNewAssign();
                                }
                                else if(params=="NewLecture"){

                                    OpenNewAssign();
                                            }
                    

    }, 1000);

}
function OpenPassword() {
   

    document.getElementById('password').showModal();
  

}

function UploadImage() {
  
    document.getElementById('profileImage').showModal();
}


function OpenNewAssign() {
 
    document.getElementById('newlect').showModal();
    popCourse();
}

function OpenNewLecture() {

    document.getElementById('newlect').showModal();
    popCourse();
}



function Route(params) {
    const myArr = params.split("/");
 let url=myArr[1]; 

 let action=myArr[2];
 let subaction=myArr[3];

if(url==sessionStorage.getItem('url')){
    

}else{
    Open(url);
}


 setTimeout(() => {
     if(action){
     Do(action);
    }    
 }, 1000);

 setTimeout(() => {
     if(subaction){
    Do(subaction); 
     }   
}, 2000);

 

 sessionStorage.setItem('url', url);

}






function Calculate(params) {
    openAlert('Enter all your grades', "Grades Incomplete", 'alert-warning');
}
CheckNetwork();

function CheckNetwork(){
let result ='';

    $.get('http://192.168.43.31/desktop.microskool/server/check.php', function(data){
        
        if(data=='success'){
result='success';
            StopLoader();
            NetworkError('none');
        }else{
            result='fail';
NetworkError('block');

        }
     
     
     
     });
     
return result;
}

function NetworkError(status) {
    document.getElementById('network').style.display=status;
    if(status=='block'){
 setInterval(() => {
     
 }, 1000);       
    }
}