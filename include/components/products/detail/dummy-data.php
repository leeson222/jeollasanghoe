<?php
/** [퍼블리싱 임시 데이터 / 프론트 연동 필요] 실제 상품 데이터가 있으면 덮어쓰지 않음 */
$productDetail = $productDetail ?? [
    'id' => 101,
    'name' => '줄무늬전갱이회',
    'description' => '줄무늬전갱이의 특별한 식감',
    'base_price' => 45000,
    'rating' => '5.0',
    'views' => 1234,
    'images' => ['/assets/images/prod-detail-main-img.png','/assets/images/prod-detail-main-img2.png','/assets/images/prod-detail-main-img3.png','/assets/images/prod-detail-main-img.png','/assets/images/prod-detail-main-img2.png','/assets/images/prod-detail-main-img3.png','/assets/images/prod-detail-main-img.png'],
    'size_options' => [
        ['id'=>'s','label'=>'소(2인) [500g]','price'=>85000],
        ['id'=>'m','label'=>'중(2~3인) [700g]','price'=>120000],
        ['id'=>'l','label'=>'대(3~4인) [900g]','price'=>160000],
        ['id'=>'xl','label'=>'특대(4~6인) [1100g]','price'=>200000],
    ],
    'thickness_options' => [['id'=>'normal','label'=>'보통'],['id'=>'thin','label'=>'얇게'],['id'=>'thick','label'=>'두껍게']],
    'spicy_options' => [['id'=>'normal','label'=>'안맵게'],['id'=>'mild','label'=>'보통'],['id'=>'hot','label'=>'맵게']],
    'extras' => [['id'=>'wasabi','label'=>'생와사비','price'=>3000],['id'=>'sauce','label'=>'매운탕 다대기','price'=>2500],['id'=>'seaweed','label'=>'모둠해초','price'=>3000]],
    'guide' => '고액결제의 경우 안전을 위해 카드사에서 확인전화를 드릴 수도 있습니다. 확인과정에서 도난 카드의 사용이나 타인 명의의 주문등 정상적인 주문이 아니라고 판단될 경우 임의로 주문을 보류 또는 취소할 수 있습니다.무통장 입금은 상품 구매 대금은 PC뱅킹, 인터넷뱅킹, 텔레뱅킹 혹은 가까운 은행에서 직접 입금하시면 됩니다. 주문시 입력한 입금자명과 실제입금자의 성명이 반드시 일치하여야 하며, 7일 이내로 입금을 하셔야 하며 입금되지 않은 주문은 자동취소 됩니다.',
    'review_count' => 134,
    'review_average' => '4.3',
    'review_bars' => [5=>123,4=>7,3=>4,2=>0,1=>0],
    'qna_count' => 7,
];
$productReviews = $productReviews ?? [
    ['id'=>1,'rating'=>5,'author'=>'ove****','date'=>'2026.02.06','option'=>'소(2인) [500g]','text'=>'신선하고 식감도 좋아요. 정말 맛있게 먹었습니다!','images'=>['/assets/images/prod-img01.png']],
    ['id'=>2,'rating'=>5,'author'=>'kim****','date'=>'2026.02.05','option'=>'소(2인) [500g]','text'=>'양도 넉넉하고 만족스러웠어요.','images'=>[]],
    ['id'=>3,'rating'=>5,'author'=>'lee****','date'=>'2026.02.04','option'=>'중(2~3인) [700g]','text'=>'재주문하고 싶은 맛이에요.','images'=>array_fill(0,5,'/assets/images/prod-img01.png')],
    ['id'=>4,'rating'=>4,'author'=>'par****','date'=>'2026.02.03','option'=>'소(2인) [500g]','text'=>'가족들이 잘 먹었습니다.','images'=>[]],
    ['id'=>5,'rating'=>5,'author'=>'cho****','date'=>'2026.02.02','option'=>'소(2인) [500g]','text'=>'회가 아주 신선해요.','images'=>[]],
];
$productQuestions = $productQuestions ?? [
    ['id'=>1,'title'=>'배송일 확인드립니다','secret'=>false,'status'=>'답변완료','author'=>'lee****','date'=>'2026.02.06','question'=>'예약한 날짜에 받을 수 있나요?','answer'=>'안녕하세요. 예약하신 시간에 맞춰 준비해 드립니다.','answered_at'=>'2026.02.07'],
    ['id'=>2,'title'=>'재입고 예정이 있나요?','secret'=>false,'status'=>'답변완료','author'=>'ice****','date'=>'2026.02.05','question'=>'재입고 일정 문의드립니다.','answer'=>'입고 일정은 상품 페이지에서 확인해 주세요.','answered_at'=>'2026.02.06'],
    ['id'=>3,'title'=>'상품 교환은 어떻게 진행하나요?','secret'=>true,'status'=>'답변대기','author'=>'kim****','date'=>'2026.02.05','question'=>null,'answer'=>null],
    ['id'=>4,'title'=>'중량 문의드립니다','secret'=>false,'status'=>'답변대기','author'=>'cho****','date'=>'2026.02.04','question'=>'중량 기준이 궁금합니다.','answer'=>null],
    ['id'=>5,'title'=>'예약 변경 가능한가요?','secret'=>false,'status'=>'답변대기','author'=>'par****','date'=>'2026.02.03','question'=>'시간 변경 가능할까요?','answer'=>null],
];
