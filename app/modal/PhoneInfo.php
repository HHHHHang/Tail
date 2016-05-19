∑

namespace App\modal;

class PhoneInfo {

	const MONEY_PER_MIN = 0.15;
	const INTEREST_PER_MONTH = 0.05;

	public $lastYearAmount; //去年未缴费名单
	public $notPayTimes; //本年未缴费次数
	public $needPayAmount;    //当月应缴费金额
	public $discount = 0;      // 对应折扣率
	public $mins;      // 本月通话时间
	public $status = true;   //判断信息的正确性

	public function __construct($lastYearAmount, $notPayTimes, $mins) {
		$this->lastYearAmount = $lastYearAmount;
		$this->notPayTimes = $notPayTimes;
		$this->mins = $mins;
		$this->status = $this->check() ? true : false;
		$this->setDiscount();
		$this->setNeedPayAmount();
	}

	public function check() {
		return $this->lastYearAmount >=0 && $this->notPayTimes <12 && $this->notPayTimes >=0 && $this->mins >= 0 && $this->mins <= 44640;
	}

	public function setDiscount() {
		if ($this->mins < 0) {
			$this->status = false;
		}
		if ($this->mins > 0 && $this->mins <= 60 && $this->notPayTimes <= 1) {
			$this->discount = 0.01;
		}
		if ($this->mins > 60 && $this->mins <= 120 && $this->notPayTimes <= 2) {
			$this->discount = 0.015;
		}
		if ($this->mins > 120 && $this->mins <= 180 && $this->notPayTimes <= 3) {
			$this->discount = 0.02;
		}
		if ($this->mins > 180 && $this->mins <= 300 && $this->notPayTimes <= 3) {
			$this->discount = 0.025;
		}
		if ($this->mins > 300 && $this->notPayTimes <= 6) {
			$this->discount = 0.03;
		}
	}

	public function setNeedPayAmount() {
		if ( ! $this->status ) {
			$this->needPayAmount = -1;
			return;
		}

		$lastYearInterest = $this->lastYearAmount * PhoneInfo::INTEREST_PER_MONTH;

		$this->needPayAmount = 25 + PhoneInfo::MONEY_PER_MIN * $this->mins * (1 - $this->discount) + $lastYearInterest;
	}

	public function getNeedPayAmouont() {
		return $this->needPayAmount;
	}

	public function getInterest() {
		return $this->lastYearAmount * PhoneInfo::INTEREST_PER_MONTH;
	}
} 