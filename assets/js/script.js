var universities = [
    "Adamson University",
    "Arellano University",
    "Centro Escolar University",
    "Far Eastern University",
    "Manuel L. Quezon University",
    "National Teachers College",
    "National University",
    "University of the East",
    "University of Santo Tomas"
];

var adu = [
    "College of Architecture",
    "College of Business Administration",
    "College of Education",
    "College of Engineering",
    "College of Law",
    "College of Liberal Arts",
    "College of Nursing",
    "College of Pharmacy",
    "College of Science"
];

var aru = [
    "College of Allied Medical Services",
    "College of Arts and Sciences",
    "College of Business And Technology - Institute of Accountancy",
    "College of Business And Technology - School of Business and Administration",
    "College of Business And Technology - School of Computer Science",
    "College of Business And Technology - School of Hospitality and Tourism Management",
    "School of Education",
    "School of Law"
];

var ceu = [
    "College of Medical Technology",
    "College of Optometry",
    "School of Dentistry",
    "School of Nutrition and Hospitality Management",
    "School of Pharmacy",
    "School of Science and Technology",
    "School of Accountancy & Management",
    "School of Education-Liberal Arts-Music-Social Work",
    "School of Nursing"
];

var feu = [
    "Institute of Accounts, Business and Finance",
    "Institute of Architecture and Fine Arts",
    "Institute of Arts and Sciences",
    "Institute of Education",
    "Institute of Nursing",
    "Institute of Tourism and Hotel Management"
];

var mlqu = [
    "School of Accountancy and Business Arts",
    "School of Architecture",
    "School of Criminal Justice",
    "School of Education, Arts & Sciences",
    "School of Engineering",
    "School of Information Technology",
    "School of Law"
];

var ntc = [
    "College of Arts and Sciences",
    "College of Business",
    "College of Computer Studies",
    "College of Education",
    "College of Hospitality Management"
];

var nu = [
    "College of Letters and Sciences",
    "School of Business and Management",
    "School of Education",
    "School of Engineering, Technology and Media",
    "School of Health and Human Services",
    "School of Professional Studies"
];

var ue = [
    "College of Arts and Sciences",
    "College of Business Administration",
    "College of Computer Studies and Systems",
    "College of Dentistry",
    "College of Education",
    "College of Engineering",
    "College of Fine Arts, Architecture and Design",
    "College of Law",
    "College of Medicine",
    "College of Nursing",
    "College of Physical Therapy"
];

var ust = [
    "AMV College of Accountancy",
    "College of Architecture",
    "College of Commerce and Business Administration",
    "College of Education",
    "College of Fine Arts and Design",
    "College of Nursing",
    "College of Rehabilitation Sciences",
    "College of Science",
    "College of Tourism and Hospitality Management",
    "Conservatory of Music",
    "Faculty of Arts and Letters",
    "Faculty of Engineering",
    "Faculty of Pharmacy"
];

function retrieveDataOne() {
    $('#reg-university').autocomplete({
        source: universities
    });
}

function retrieveDataTwo() {
    $item = $('#reg-university').val();

    if($item == "Adamson University") {
        $('#reg-college').autocomplete({
            source: adu
        });
    } else if($item == "Arellano University") {
        $('#reg-college').autocomplete({
            source: aru
        });
    } else if($item == "Centro Escolar University") {
        $('#reg-college').autocomplete({
            source: ceu
        });
    } else if($item == "Far Eastern University") {
        $('#reg-college').autocomplete({
            source: feu
        });
    } else if($item == "Manuel L. Quezon University") {
        $('#reg-college').autocomplete({
            source: mlqu
        });
    } else if($item == "National Teachers College") {
        $('#reg-college').autocomplete({
            source: ntc
        });
    } else if($item == "National University") {
        $('#reg-college').autocomplete({
            source: nu
        });
    } else if($item == "University of the East") {
        $('#reg-college').autocomplete({
            source: ue
        });
    } else if($item == "University of Santo Tomas") {
        $('#reg-college').autocomplete({
            source: ust
        });
    }
}

function reretrieveDataOne() {
    $('#update-university').autocomplete({
        source: universities
    });
}

function reretrieveDataTwo() {
    $item = $('#update-university').val();

    if($item == "Adamson University") {
        $('#update-college').autocomplete({
            source: adu
        });
    } else if($item == "Arellano University") {
        $('#update-college').autocomplete({
            source: aru
        });
    } else if($item == "Centro Escolar University") {
        $('#update-college').autocomplete({
            source: ceu
        });
    } else if($item == "Far Eastern University") {
        $('#update-college').autocomplete({
            source: feu
        });
    } else if($item == "Manuel L. Quezon University") {
        $('#update-college').autocomplete({
            source: mlqu
        });
    } else if($item == "National Teachers College") {
        $('#update-college').autocomplete({
            source: ntc
        });
    } else if($item == "National University") {
        $('#update-college').autocomplete({
            source: nu
        });
    } else if($item == "University of the East") {
        $('#update-college').autocomplete({
            source: ue
        });
    } else if($item == "University of Santo Tomas") {
        $('#update-college').autocomplete({
            source: ust
        });
    }
}

$(document).ready(function() {
    $('#reg-submit').click(function(){
        var fullName = document.getElementById('reg-full-name').value;
        var university = document.getElementById('reg-university').value;
        var college = document.getElementById('reg-college').value;

        $.ajax({
            url: 'request.php',
            method: 'get',
            data: {
                ifullname: fullName,
                iuniversity: university,
                icollege: college
            },
            success: function(data){
                document.getElementById('overlay-items').innerHTML = data;

                if(data == "You are already registered.") {
                    $('#overlay').fadeIn(1000);
                    $('#overlay-items').fadeIn(1000);
                    $('input[type=text]').css('border', '5px solid rgb(221, 30, 47)');
                    setTimeout(function() {
                        $('#overlay').fadeOut(1000);
                        $('#overlay-items').fadeOut(1000);
                    }, 3000);
                    setTimeout(function() {
                        $('input[type=text]').css('border', '5px solid rgb(33, 133, 89)');
                    }, 3000);
                    $('input[type=text]').val('');
                    $('#reg-full-name').focus();
                } else if(data == "Please fill up all fields.") {
                    if($('#reg-college').val() != "") {
                        $('#reg-college').css('border', '5px solid rgb(33, 133, 89)');
                        $('#reg-full-name').focus();
                    } else {
                        $('#reg-college').css('border', '5px solid rgb(221, 30, 47)');
                        $('#reg-college').focus();
                    }

                    if($('#reg-university').val() != "") {
                        $('#reg-university').css('border', '5px solid rgb(33, 133, 89)');
                        $('#reg-college').focus();
                    } else {
                        $('#reg-university').css('border', '5px solid rgb(221, 30, 47)');
                        $('#reg-university').focus();
                    }

                    if($('#reg-full-name').val() != "") {
                        $('#reg-full-name').css('border', '5px solid rgb(33, 133, 89)');
                        $('#reg-university').focus();
                    } else {
                        $('#reg-full-name').css('border', '5px solid rgb(221, 30, 47)');
                        $('#reg-full-name').focus();
                    }

                    setTimeout(function() {
                        $('input[type=text]').css('border', '5px solid rgb(33, 133, 89)');
                    }, 3000);

                    $('#help').stop().fadeOut(0);
                    $('#help').fadeIn(500);
                    document.getElementById('help').innerHTML = "<strong>I think you forgot something...</strong><br><br>Please fill up all boxes with red borders.";
                } else {
                    $('#overlay').fadeIn(1000);
                    $('#overlay-items').fadeIn(1000);
                    $('input[type=text]').css('background-color', 'rgb(33, 133, 89)');
                    $('input[type=text]').css('color', 'white;');
                    setTimeout(function() {
                        $('#overlay').fadeOut(1000);
                        $('#overlay-items').fadeOut(1000);
                    }, 3000);
                    setTimeout(function() {
                        $('input[type=text]').css('background-color', 'white');
                        $('input[type=text]').css('color', 'black;');
                    }, 3000);
                    $('input[type=text]').css('color', 'white;');
                    $('input[type=text]').val('');
                    $('#reg-full-name').focus();
                }
            }
        });
    });

    $('#update-button').click(function() {
        var oldfullName = document.getElementById('old-full-name').value;
        var fullName = document.getElementById('update-full-name').value;
        var university = document.getElementById('update-university').value;
        var college = document.getElementById('update-college').value;

        $.ajax({
            url: 'update.php',
            method: 'get',
            data: {
                ioldfullname: oldfullName,
                ifullname: fullName,
                iuniversity: university,
                icollege: college
            },
            success: function(data){
                $('#overlay').css('display', 'none');
                $('#overlay-items-new').css('display', 'none');
                $('#update-form').css('display', 'none');
                $('#remove-form').css('display', 'none');
            }
        });
    });

    $('#ub').click(function() {
        $('#overlay').css('display', 'inline-block');
        $('#overlay-items-new').css('display', 'inline-block');
        $('#update-form').css('display', 'inline-block');
    });

    $('#rb').click(function() {
        $('#overlay').css('display', 'inline-block');
        $('#overlay-items-new').css('display', 'inline-block');
        $('#remove-form').css('display', 'inline-block');
    });

    $('#reg-full-name').focus(function() {
        $('#help').stop().fadeOut(0);
        $('#help').fadeIn(500);
        document.getElementById('help').innerHTML = "<strong>Enter your name here.</strong><br><br>Example: Juan C. Dela Cruz";
    });

    $('#reg-full-name').click(function() {
        $('#help').stop().fadeOut(0);
        $('#help').fadeIn(500);
        document.getElementById('help').innerHTML = "<strong>Enter your name here.</strong><br><br>Example: Juan C. Dela Cruz";
    });
    
    $('#reg-university').click(function() {
        $('#help').stop().fadeOut(0);
        $('#help').fadeIn(500);
        document.getElementById('help').innerHTML = "<strong>Select your university name from the list. Remember: Choose the university where you are currently enrolled.</strong><br><br>Example: Malaya University";
    });
    
    $('#reg-college').click(function() {
        $('#help').stop().fadeOut(0);
        $('#help').fadeIn(500);
        document.getElementById('help').innerHTML = "<strong>Select your university college from the list.</strong><br><br>Example: College of Computer Studies and Systems";
    });

    $('#overlay').click(function() {
        $('#overlay').css('display', 'none');
        $('#overlay-items').css('display', 'none');
        $('#overlay-items-new').css('display', 'none');
        $('#update-form').css('display', 'none');
        $('#remove-form').css('display', 'none');
        $('input[type=text]').val('');
    });
});