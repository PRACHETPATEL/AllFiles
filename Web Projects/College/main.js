document.addEventListener("DOMContentLoaded",()=>{
    const form=document.getElementById('details');
    form.addEventListener('submit',(e)=>{
        e.preventDefault();
        const name=document.getElementById('name');
        const EnrollNo=document.getElementById('EnrollNo');
        const contact=document.getElementById('contact');
        const email=document.getElementById('email');
        const branch=document.querySelector('#branch');
        const address=document.querySelector('#address');
        const radio=document.getElementsByName('gender');
        const checkbox=document.getElementsByName('sub');
        var branchname=branch.value;
        var gender;
        radio.forEach((button)=>{
            if(button.checked){
                gender=button.className;
            }
        })
        let subjects=[];
        checkbox.forEach((button)=>{
            if(button.checked){
               subjects.push(button.className);
            }
        })
        const StudentDetails={
            Name:name.value,
            EnrollmentNumber:EnrollNo.value,
            Contact:contact.value,
            Email:email.value,
            Branch:branchname,
            Gender:gender,
            Subjects_Selected:subjects,
            Address:address.value
        }
        console.log(StudentDetails);
    })
})