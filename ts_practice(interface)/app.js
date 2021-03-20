//after compile, as you can see app.js file,
// enum is an actual function
// that has numbering(male = 0, female = 1)
//Numeric enum(숫자 열거형): gives number to order by number
var GenderType;
(function (GenderType) {
    GenderType[GenderType["Male"] = 0] = "Male";
    GenderType[GenderType["Female"] = 1] = "Female";
    GenderType[GenderType["GenderNeutral"] = 2] = "GenderNeutral";
    //  if you want to set String Enum(문자열거형), you can do like below
    //    This makes easy to read code in js file
    //     Male = 'Male',
    //     Female = 'Female',
    //     GenderNeutral = 'GenderNeutral'
})(GenderType || (GenderType = {}));
var student1 = {
    studentID: 1234,
    studentName: 'string',
    age: 30,
    gender: GenderType.Female,
    subject: 'node js',
    courseCompleted: true
};
function getStudentDetails(studentID) {
    return {
        studentID: 1234,
        studentName: 'string',
        age: 30,
        gender: GenderType.Male,
        // gender: "male"
        subject: 'node js',
        courseCompleted: true
    };
}
function saveStudentDetails(student) {
    //this makes an error cause property 'studentID' is readonly
    //which means its value can't be changed
    // student.studentID = 12222
}
saveStudentDetails(student1);
