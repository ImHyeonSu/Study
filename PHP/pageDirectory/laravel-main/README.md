# 어썸 라라벨

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<img src="https://github.com/php-courses-inflearn/laravel/actions/workflows/laravel.yml/badge.svg" alt="Build Status">
<img src="https://img.shields.io/badge/laravel%2Fframework-^10.0-red?&logo=laravel" alt="Laravel Version">
<img src="https://img.shields.io/badge/php-^8.1-blue?logo=php" alt="PHP Version">
<img src="https://codecov.io/gh/php-courses-inflearn/laravel/branch/main/graph/badge.svg?token=5NWU0Y3OT6"/>
</p>

## 목차

### 서문

- 라라벨 프레임워크
- 라라벨 공식문서
- 라라벨 커뮤니티
- 책 속으로 들어가기 전에

### Chapter 1. 안녕, 세계!

- 1.1 로컬 환경에 설치하기
    - 1.1.1 컴포저
    - 1.1.2 확장
    - 1.1.3 라라벨 인스톨러
    - 1.1.4 안녕, 세계!
- 1.2 아티즌
- 1.3 환경설정
- 1.4 설정

### Chapter 2. 아키텍처

- 2.1 MVC(Model, View, Controller)
    - 2.1.1 모델
    - 2.1.2 뷰
    - 2.1.3 컨트롤러
- 2.2 컨테이너
    - 2.2.1 의존성 주입
    - 2.2.2 서비스 컨테이너
- 2.3 서비스 프로바이더
    - 2.3.1 부트스트래핑
    - 2.3.2 지연된 서비스 프로바이더
- 2.4 파사드
    - 2.4.1 실시간 파사드
- 2.5 헬퍼함수
- 2.6 Laravel Contracts

### Chapter 3. 프로젝트 개요 및 준비

- 3.1 새로운 프로젝트 생성하기
- 3.2 개발환경
- 3.3 라라벨 홈스테드
    - 3.3.1 VirtualBox
    - 3.3.2 Vagrant
    - 3.3.3 laravel/homestead
    - 3.3.4 프로비저닝
- 3.4 라라벨 디버그바
- 3.5 라라벨 팅커
- 3.6 로깅
    - 3.6.1 채널
    - 3.6.2 로그레벨
    - 3.6.3 사용자 정의 채널
- 3.7 예외
    - 3.7.1 예외 핸들러
    - 3.7.2 사용자 정의 예외
    - 3.7.3 커스텀 HTTP 예외 오류페이지
- 3.8 라라벨 텔레스코프
    - 3.8.1 설치
    - 3.8.2 설정
    - 3.8.3 서비스 프로바이더
- 3.9 테스트
    - 3.9.1 커버리지
    - 3.9.2 artx 별칭 지정하기
- 3.10 에셋 번들링
    - 3.10.1 vite.config.js
    - 3.10.2 명령어
    - 3.10.3 리소스 포함하기

### Chapter 4. 인증

- 4.1 데이터베이스
    - 4.1.1 설정
    - 4.1.2 마이그레이션
    - 4.1.3 모델
    - 4.1.4 모델 팩토리
    - 4.1.5 시딩
    - 4.1.6 쿼리빌더
    - 4.1.7 옐로퀸트 ORM
- 4.2 뷰
    - 4.2.1 블레이드 템플릿
    - 4.2.2 다국어
- 4.3 라우팅 & 컨트롤러
    - 4.3.1 미들웨어
- 4.4 회원가입
    - 4.4.1 라우팅 & 컨트롤러
    - 4.4.2 뷰
    - 4.4.3 유효성 검사
    - 4.4.4 해싱
    - 4.4.5 세션
    - 4.4.6 이메일 인증
    - 4.4.7 이벤트
    - 4.4.8 Form Requests
    - 4.4.9 테스트
    - 4.4.10 이메일 인증 테스트
    - 4.4.11 사용자 정의 규칙 테스트
    - 4.4.12 비밀번호 규칙 테스트
- 4.5 로그인 & 로그아웃
    - 4.5.1 라우팅 & 컨트롤러
    - 4.5.2 로그인
    - 4.5.3 로그아웃
    - 4.5.4 테스트
- 4.6 소셜 로그인
    - 4.6.1 OAuth2
    - 4.6.2 Github OAuth Apps
    - 4.6.3 마이그레이션
    - 4.6.4 서비스 제공자
    - 4.6.5 라우팅 & 컨트롤러
    - 4.6.6 구현
    - 4.6.7 테스트
    - 4.6.8 세션 매크로 테스트
- 4.7 비밀번호 재설정
    - 4.7.1 모델
    - 4.7.2 마이그레이션
    - 4.7.3 라우팅 & 컨트롤러
    - 4.7.4 구현
    - 4.7.5 설정
    - 4.7.6 Password 파사드
    - 4.7.7 테스트
- 4.8 비밀번호 확인
    - 4.8.1 라우팅 & 컨트롤러
    - 4.8.2 구현
    - 4.8.3 설정
    - 4.8.4 미들웨어
    - 4.8.5 테스트
    - 4.8.6 미들웨어 테스트
- 4.9 마이페이지
    - 4.9.1 라우팅 & 컨트롤러
    - 4.9.2 구현
    - 4.9.3 테스트

### Chapter 5. 커뮤니티

- 5.1 블로그
    - 5.1.1 모델
    - 5.1.2 마이그레이션
    - 5.1.3 모델 팩토리
    - 5.1.4 시딩
    - 5.1.5 라우팅 & 컨트롤러
    - 5.1.6 구현
    - 5.1.7 정책과 인가
    - 5.1.8 대시보드
    - 5.1.9 테스트
    - 5.1.10 대시보드 테스트
- 5.2 구독
    - 5.2.1 모델
    - 5.2.2 마이그레이션
    - 5.2.3 시딩
    - 5.2.4 라우팅 & 컨트롤러
    - 5.2.5 구현
    - 5.2.6 대시보드
    - 5.2.7 테스트
    - 5.2.8 대시보드 테스트
- 5.3 글
    - 5.3.1 모델
    - 5.3.2 마이그레이션
    - 5.3.3 모델 팩토리
    - 5.3.4 시딩
    - 5.3.5 라우팅 & 컨트롤러
    - 5.3.6 구현
    - 5.3.7 정책과 인가
    - 5.3.8 테스트
- 5.4 댓글
    - 5.4.1 모델
    - 5.4.2 마이그레이션
    - 5.4.3 모델 팩토리
    - 5.4.4 시딩
    - 5.4.5 라우팅 & 컨트롤러
    - 5.4.6 구현
    - 5.4.7 대시보드
    - 5.4.8 정책과 인가
    - 5.4.9 옐로퀸트 이벤트
    - 5.4.10 테스트
    - 5.4.11 대시보드 테스트
    - 5.4.12 Observer 테스트
- 5.5 파일
    - 5.5.1 파일 스토리지
    - 5.5.2 모델
    - 5.5.3 마이그레이션
    - 5.5.4 모델 팩토리
    - 5.5.5 시딩
    - 5.5.6 속성 캐스팅
    - 5.5.7 라우팅 & 컨트롤러
    - 5.5.8 구현
    - 5.5.9 모델 가지치기
    - 5.5.10 정책과 인가
    - 5.5.11 테스트
    - 5.5.12 속성 캐스팅 테스트
    - 5.5.13 모델 가지치기 테스트
    - 5.5.14 Observer 테스트
- 5.6 피드
    - 5.6.1 라우팅 & 컨트롤러
    - 5.6.2 구현
    - 5.6.3 테스트
    - 5.6.4 컬렉션 매크로 테스트

### Chapter 6. 레벨업

- 6.1 큐
    - 6.1.1 설정
    - 6.1.2 마이그레이션
    - 6.1.3 큐 워커
    - 6.1.4 라라벨 호라이즌
- 6.2 메일
    - 6.2.1 설정
    - 6.2.2 Mailable
    - 6.2.3 큐
    - 6.2.4 테스트
- 6.3 알림
    - 6.3.1 Notification
    - 6.3.2 Notifiable
    - 6.3.3 Notification 파사드
    - 6.3.4 이메일 알림
    - 6.3.5 큐
    - 6.3.6 테스트
    - 6.3.7 알림 테스트
- 6.4 이벤트
    - 6.4.1 Registered 이벤트
    - 6.4.2 이벤트
    - 6.4.3 큐
    - 6.4.4 구독자 알림
    - 6.4.5 테스트
    - 6.4.6 이벤트 리스너 테스트
    - 6.4.7 알림 테스트
- 6.5 브로드캐스팅
    - 6.5.1 설정
    - 6.5.2 서비스 프로바이더
    - 6.5.3 Laravel Websockets
    - 6.5.4 이벤트
    - 6.5.5 알림 브로드캐스팅
    - 6.5.6 채널 테스트
- 6.6 아티즌 콘솔
    - 6.6.1 아티즌 커맨드
    - 6.6.2 시그니처와 프롬프트
    - 6.6.3 Artisan 파사드
    - 6.6.4 mail:send 명령어 작성하기
    - 6.6.5 쿼리 스코프
    - 6.6.6 테스트
    - 6.6.7 쿼리 스코프 테스트
    - 6.6.8 Mailable 테스트
- 6.7 작업 스케줄링
    - 6.7.1 스케줄 정의하기
    - 6.7.2 스케줄러
    - 6.7.3 mali:send 명령어 스케줄링
    - 6.7.4 스케줄러 테스트
- 6.8 검색
    - 6.8.1 Meilisearch 검색엔진
    - 6.8.2 라라벨 스카우트
    - 6.8.3 /search 라우트 작성하기
    - 6.8.4 테스트
- 6.9 로케일
    - 6.9.1 미들웨어 테스트

### Chapter 7. REST API

- 7.1 RESTful API 란 무엇인가?
    - 7.1.1 URI
    - 7.1.2 HTTP 메서드
    - 7.1.3 HTTP 헤더
    - 7.1.4 HTTP 상태코드
    - 7.1.5 HATEOAS
    - 7.1.6 버저닝
- 7.2 라라벨 생텀
    - 7.2.1 설치
    - 7.2.2 API 토큰 사용하기
    - 7.2.3 대시보드
    - 7.2.4 테스트
    - 7.2.5 대시보드 테스트
- 7.3 HTTP 클라이언트
    - 7.3.1 HTTP 파사드
    - 7.3.2 HTTP 클라이언트 테스트
- 7.4 API
    - 7.4.1 서비스 레이어
    - 7.4.2 구현
    - 7.4.3 정책과 인가
    - 7.4.4 테스트
- 7.5 모델 직렬화
    - 7.5.1 가시성
- 7.6 API 리소스
    - 7.6.1 리소스
    - 7.6.2 리소스 컬렉션
    - 7.6.3 테스트
- 7.7 캐시
    - 7.7.1 백엔드
    - 7.7.2 클라이언트
    - 7.7.3 테스트
- 7.8 레이트 리미터
    - 7.8.1 미들웨어
- 7.9 SPA 인증
    - 7.9.1 라라벨 Axios
    - 7.9.2 테스트
- 7.10 JWT(Json Web Token) 인증
    - 7.10.1 구조
    - 7.10.2 설정
    - 7.10.3 모델
    - 7.10.4 Auth Guards
    - 7.10.5 라우팅 & 컨트롤러
    - 7.10.6 구현
    - 7.10.7 테스트

### Chapter 8. 배포

- 8.1 프로비저닝
- 8.2 Laravel Envoy
  - 8.2.1 Envoy.blade.php
- 8.3 점검모드

### 한층 더 나아가기

- 스타터킷
- 토큰
- 큐
- 프론트엔드
- 배포
- 테스트
- 마이크로 프레임워크
- 콘솔
- 대시보드
- 버전
- 코드품질

## 저작권

MIT

Copyright 2022. [SangWoo Jeong](https://github.com/pronist). All rights reserved.
