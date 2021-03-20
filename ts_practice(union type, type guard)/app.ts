//any: 타입 체크 안하겠다
// 타입 명시하는게 좋음. 효과적인 코드의 유지 보수
// 제한된 타입을 동시에 지정하고 싶을 때: union type
let price: number | string = 5
price = 'hello'
price = 123
//boolean 값 할당 불가능
// price = true

//type aliases: 유니언 타입을 따로 선언해둠(type 키워드 사용)
type StrOrNum = number | string
let totalCost: number
let orderID: StrOrNum

const calculateTotalCost = (price: StrOrNum, qty: number): void => {

}
const findOrderID = (customer: {customerId: StrOrNum, name: string}, productId: StrOrNum): StrOrNum => {
    return orderID
}


type StringOrNum = string | number
let itemPrice: number

const setItemPrice = (price: StrOrNum): void => {
    // 숫자밖에 할당이 안되는 itemPrice에 숫자, 문자열 다 가능한 price가 할당될 수 없음
    // itemPrice = price

    //typeof operator 사용하여 타입 검증할 수 있음
    //we call this as 'Type Guard'
    // typeof 사용하는거 말고도 타입 가드할 수 있는 방법은 많음. 서치해보3
    if(typeof price === 'string') {
        itemPrice = 0
    } else {
        itemPrice = price
    }

}
setItemPrice(50)
