const date=new Date() //本日のインスタンスを生成
const year=date.getFullYear();//本日の年
const month=date.getMonth()+1;//本日の月

const date_title=year+"/"+month;

const startDate=new Date(year,month-1,1);//月の最初に日付を取得するオブジェクトを生成
const endDate=new Date(year,month,0);//月の最終日付を取得するオブジェクトを生成
const endDayCount=endDate.getDate();//月の最終の日付
const startDay=startDate.getDay();//月の最初の日の曜日

let dayCount=1;
let calhtml=''


// console.log(endDate);


document.querySelector('#date_title').innerHTML=date_title;

// document.querySelector('.calender').innerHTML="aaa";