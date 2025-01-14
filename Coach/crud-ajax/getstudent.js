// function viewStudent(requirements_id) {
//     // Display loading message
//     document.getElementById('student-info').innerHTML = '<p>Loading student details...</p>';

//     // Use AJAX to fetch the student details
//     $.ajax({
//         url: 'controller/getStudentName.php',
//         method: 'POST',
//         data: { requirements_id: requirements_id },
//         success: function(response) {
//             try {
//                 var student = JSON.parse(response);
//                 if (student.error) {
//                     document.getElementById('student-info').innerHTML = '<p>' + student.error + '</p>';
//                 } else {
//                     var infoHtml = `
//                         <p><strong>Name:</strong> ${student.first_name} ${student.middle_initial || ''} ${student.last_name}</p>
//                         <p><strong>Gender:</strong> ${student.gender}</p>
//                         <p><strong>Height:</strong> ${student.height}</p>
//                         <p><strong>Weight:</strong> ${student.weight}</p>
//                         <p><strong>BMI:</strong> ${student.bmi}</p>
//                         <p><strong>Phone Number:</strong> ${student.phone_number}</p>
//                         <p><strong>Health Protocol:</strong> ${student.health_protocol || 'Not provided'}</p>
//                     `;
//                     document.getElementById('student-info').innerHTML = infoHtml;
//                 }
//             } catch (e) {
//                 document.getElementById('student-info').innerHTML = '<p>Error processing data.</p>';
//             }
//         },
//         error: function() {
//             document.getElementById('student-info').innerHTML = '<p>Failed to fetch student details. Please try again.</p>';
//         }
//     });
// }