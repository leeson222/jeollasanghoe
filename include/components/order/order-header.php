<?php
$orderType = ($_GET['order_type'] ?? '') === 'quick' ? 'quick' : 'pickup';
$pickupType = ($_GET['pickup_type'] ?? '') === 'takeout' ? 'takeout' : 'dine-in';
$deliveryType = '';

$orderHeaderType = '매장픽업';
$orderHeaderTitle = $pickupType === 'takeout' ? '방문 포장' : '매장 식사';

if ($orderType === 'quick') {
    $deliveryType = ($_GET['delivery_type'] ?? '') === 'scheduled' ? 'scheduled' : 'immediate';
    $orderHeaderType = '퀵배송';
    $orderHeaderTitle = $deliveryType === 'scheduled' ? '예약 배달' : '즉시 배달';
}
?>

<div class="order-header mb-30" data-order-type="<?= htmlspecialchars($orderType) ?>" data-delivery-type="<?= htmlspecialchars($deliveryType) ?>">
    <span class="Body-XXXS3"><?= htmlspecialchars($orderHeaderType) ?></span>
    <h2 class="Body-M2"><?= htmlspecialchars($orderHeaderTitle) ?></h2>
</div>
