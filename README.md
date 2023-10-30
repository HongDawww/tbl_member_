# tbl_member

> 목적 & 개요 💭
>
> 
 🔨 PHP 기반으로 제작된  게시판 

 
 🔨  편리한 작성, 수정, 삭제  

# member_list / Figma Design 

> Figma를 사용하여 디자인 제작
> 
> ** insert / update / delete 동일 css 적용


![list](https://github.com/HongDawww/tbl_member_/assets/142575028/ef95af4e-fb9e-43ad-9344-b16c9cff153c)
![insert](https://github.com/HongDawww/tbl_member_/assets/142575028/d77e29ac-75ee-449b-80aa-dde52486d279)
![update](https://github.com/HongDawww/tbl_member_/assets/142575028/218dcbd2-52aa-4632-a458-3239eb084958)


# tbl_member / ERD
![tbl_member_erd](https://github.com/HongDawww/tbl_member/assets/142575028/068b629f-76b4-4372-adc1-20abde11ab5d)
![tbl_member](https://github.com/HongDawww/tbl_member/assets/142575028/ef85ea74-fd77-4e02-872d-5e8f6f847e77)


# 활용 기술
  <div>
   <img src="https://img.shields.io/badge/html5-E34F26?style=for-the-badge&logo=html5&logoColor=white"> 
   <img src="https://img.shields.io/badge/css-1572B6?style=for-the-badge&logo=css3&logoColor=white">
   <img src="https://img.shields.io/badge/github-181717?style=for-the-badge&logo=github&logoColor=white">
   <img src="https://img.shields.io/badge/mariaDB-003545?style=for-the-badge&logo=mariaDB&logoColor=white">
   <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
   <img src="https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=Figma&logoColor=white">
   <img src="https://img.shields.io/badge/VisualStudio-5C2D91?style=for-the-badge&logo=Slack&logoColor=white">
   <img src="https://img.shields.io/badge/bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white">
  </div>




💛 추가된 기능 💛 


제목 영역 css 애니메이션 추가

input 입력란 css 추가


button css 추가 





# page information 💁
📃 member list 📃
- 전체 게시글 리스트 출력
-  1 페이지 당 4개의 게시글 출력
- 페이지 버튼 출력
- 처음, previous , Next , 맨끝 버튼 출력
- 페이지 고정
- 페이지부터 처음, previous , Next , 맨끝에 효과 설정

📓 insert 📓
  - id , name , email , password 입력란 출력
  - register : 작성일자로 자동 입력
  - register 클릭 시 자동입력 문구 출력
  - submit , back , memberlist 버튼 생성
  - submit : 추가 성공 문구 출력
  - back : 이전 페이지로 이동
  - memberlist : memberlist 페이지로 이동

✅ update ✅
  - 해당 리스트 출력
  - update , back , memberlist 버튼 생성
  - 모든 정보 수정 가능
  - update : 수정 완료 처리
  - back : 이전 페이지로 이동
  - memberlist : member list 페이지로 이동

✔️ Delete ✔️
  - 게시글의 모든 정보 출력
  - 수정 불가
  - 비밀번호 일치 여부 확인
  - delete, back, memberlist 버튼 생성
  - delete : 삭제 후 리스트 페이지 이동
  - delete ( 비밀번호 불일치 ) :  메세지 출력
  - back : 이전 페이지로 이동
  - memberlist : memberlist 페이지로 이동

✍️ Memo ✍️ 
 - 아이디 , 이메일, 비밀번호 , 메모 입력란 생성
 - submit, back 버튼 생성
 - submit 클릭시 하단에 출력, filedb.txt 에 저장됨
 - back 버튼 클릭시 이전 페이지로 이동 
