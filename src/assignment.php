<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src="js/background.js" defer></script>
</head>

<body>
    <a href="welcome.php" class="back">Back</a>
    <div class="container">
        <h1> Assignments </h1>
        <div class="assignments">
            <div class="assignment">
                <h2>Assignment 1</h2>
                <p>Due: 10/10/2022</p>
                <a class="view">View</a>
            </div>


            <div class="assignment">
                <h2>Assignment 2</h2>
                <p>Due: 10/11/2022</p>
                <a class="view">View</a>
            </div>

            <div class="add-assignment">
                <a class="add">+</a>
            </div>
        </div>
    </div>

    <div class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2></h2>
                <a class="close">X</a>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</body>
<script defer>
    // Clicking on the add button should open a modal with a form to add an assignment
    // Clicking on the view button should open a modal with the assignment details
    // For now, the the details should just be a paragraph with some text and no database interaction

    const modal = document.querySelector(".modal");

    const addBtn = document.querySelector(".add");
    const viewBtns = document.getElementsByClassName("view");

    const closeBtn = document.querySelector(".close");

    addBtn.onclick = function() {
        changeModalToAdd();
        modal.style.display = "block";
    }

    viewBtns[0].onclick = function() {
        changeModal("Assignment 1", ["Q1: What is the difference between a class and an object?", "Q2: Describe a. Encapsulation b. Inheritance c. Polymorphism", "Q3: What is the role of a constructor in a class?"]);
        modal.style.display = "block";
    }

    viewBtns[1].onclick = function () {
        changeModal("Assignment 2", ["Q1: Define Primary Key", "Q2: Illustrate differences between Primary and Foreign Key", "Q3: Define Data, Database, Database Management System"]);
        modal.style.display = "block";
    }

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }
    
    function changeModal(title, content){
        const modalHeader = document.querySelector(".modal-header h2");
        const modalBody = document.querySelector(".modal-body");
        modalHeader.innerText = title;
        modalBody.innerHTML = "";
        content.forEach(element => {
            const para = document.createElement("p");
            para.innerText = element;
            modalBody.appendChild(para);
        });
    }

    function changeModalToAdd(){
        // Changes the modal completely to the add assignment form
        const modalHeader = document.querySelector(".modal-header h2");
        const modalBody = document.querySelector(".modal-body");

        modalHeader.innerText = "Add Assignment";
        modalBody.innerHTML = "";
    
        const form = document.createElement("form");
        form.setAttribute("action", "assignment.php");
        form.setAttribute("method", "POST");
        const title = document.createElement("input");
        title.setAttribute("type", "text");
        title.setAttribute("name", "title");
        title.setAttribute("placeholder", "Title");
        const due = document.createElement("input");
        due.setAttribute("type", "date");
        due.setAttribute("name", "due");
        const question = document.createElement("textarea");
        question.setAttribute("rows", "4");
        question.setAttribute("cols", "96");
        question.setAttribute("type", "text");
        question.setAttribute("name", "question");
        question.setAttribute("placeholder", "Question");
        const submit = document.createElement("input");
        submit.setAttribute("type", "submit");
        submit.setAttribute("value", "Submit");
        form.appendChild(title);
        form.appendChild(due);
        form.appendChild(question);
        form.appendChild(submit);
        modalBody.appendChild(form);
    }
</script>
<style>
    *, *:before, *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Rubik', sans-serif;
    }
    body {
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
    }
    h1{
        font-family: 'Rubik', sans-serif;
        font-size: 50px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 300;
        text-align: center;
        margin-bottom: 15px;
    }
    .container{
        width: 50%;
        height: 500px;
        max-width: 1200px;
        padding: 0 15px;
        margin: 10px auto 0;
    }

    .assignments{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    .assignment, .add-assignment{
        width: 100%;
        height: 100px;
        background: rgba(255,255,255,0.06);
        margin: 10px 0;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }

    .assignment h2{
        font-size: 20px;
        color: #fff;
        font-weight: 300;
    }

    .assignment p{
        font-size: 15px;
        color: #fff;
        font-weight: 300;
    }

    .assignment a{
        text-decoration: none;
        color: #fff;
        background: rgba(255,255,255,0.06);
        padding: 10px 2 0px;
        border-radius: 5px;
        font-size: 15px;
        font-weight: 300;
        transition: 0.3s;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 0px;
    }

    .add-assignment{
        background: rgba(255, 255, 255, 0);
        justify-content: center;
        align-items: center;
    }

    .add-assignment a{
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 50px;
        color: #fff;
        transition: 0.3s;
    }

    .add-assignment a:hover, .assignment a:hover{
        background: rgba(255,255,255,0.2);
        cursor: pointer;
    }
    
    .modal{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .modal-content{
        width: 50%;
        height: 65%;
        max-width: 1200px;
        background: rgb(23, 42, 70);
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }

    .modal-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .modal-header h2{
        font-size: 30px;
        color: #fff;
        font-weight: 300;
    }

    .modal-header a{
        text-decoration: none;
        color: #fff;
        background: rgba(255,255,255,0.06);
        padding: 10px 2 0px;
        border-radius: 5px;
        font-size: 15px;
        font-weight: 300;
        transition: 0.3s;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 0px;
    }

    .modal-header a:hover{
        background: rgba(255,255,255,0.2);
        cursor: pointer;
    }

    .modal-body{
        width: 90%;
        height: 60%;
        margin-bottom: 5%;
        margin-left: 5%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .modal-body p{
        font-size: 15px;
        color: #fff;
        font-weight: 300;
    }

    input {
        height: 50px;
        width: 100%;
        background-color: rgba(255,255,255,0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 6px;
        font-size: 15px;
        font-weight: 300;
    }
    textarea {
        display: block;
        width: 100%;
        height: 70px;
        background-color: rgba(255,255,255,0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 6px;
        font-size: 15px;
        font-weight: 300;
        margin-top: 6px;
        padding-top: 10px;
        padding-bottom: 10px;
        resize: none;
    }
</style>
</html>