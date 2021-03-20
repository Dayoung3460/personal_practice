//after compile, as you can see app.js file,
// enum is an actual function
// that has numbering(male = 0, female = 1)
//Numeric enum(숫자 열거형): gives number to order by number

enum GenderType {
    Male,
    Female,
    GenderNeutral

//  if you want to set String Enum(문자열거형), you can do like below
//    This makes easy to read code in js file

//     Male = 'Male',
//     Female = 'Female',
//     GenderNeutral = 'GenderNeutral'
}

let student1 = {
    studentID: 1234,
    studentName: 'string',
    age: 30,
    gender: GenderType.Female,
    subject: 'node js',
    courseCompleted: true,
}

//interface는 js에서 안보임. 컴파일 된 후 없어짐.
interface Student {
    readonly studentID: number
    studentName: string
    // with '?' means the property 'age' is optional
    age?: number
    //문자열거형 또는 숫자 열거형 사용 시 이렇게
    gender: GenderType
    //literal enum 사용시 이렇게 더 간단하게도 가능
    // gender: 'male' | 'female' | 'genderNeutral'
    subject: string
    courseCompleted: boolean
    // optional method
    addComment?(comment: string): string
    // same as above
    // addComment: (comment: string) => string
}

function getStudentDetails(studentID: number): Student {
    return {
        studentID: 1234,
        studentName: 'string',
        age: 30,
        gender: GenderType.Male,
        // gender: "male"
        subject: 'node js',
        courseCompleted: true,
    }
}

function saveStudentDetails (student: Student): void {
    //this makes an error cause property 'studentID' is readonly
    //which means its value can't be changed
    // student.studentID = 12222
}

saveStudentDetails(student1)