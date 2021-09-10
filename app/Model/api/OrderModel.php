<?php

namespace App\Model\api;

use App\Traits\Updater;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class OrderModel extends Model {
	use SoftDeletes, Updater;

	protected $table = 'order';

	public $fillable = [
		'code',
		'status',
		'order_id',
		'student_id',
		'course_id',
		'class_id',
		'course_form_payment_id',
		'supervision_id',
		'form_payment_id',
		'responsible_id',
		'bank_id',
		'course_discount_id',
		'company_id',

		'form_payment',
		'due_date',

		'number_parcel',
		'value',
		'full_value',
		'discount_value',
		'discount_percentage',

		'value_paid',
		'payday',

		'birth_date',
		'email',
		'cardholder',
		'cpf',
		'number_card',
		'phone',
		'security_code',
		'shelf_life',
		'zip_code',
		'address_number',
		'contract',
		'asaas_payments_code',
		'asaas_customers_code',
		'asaas_json',

		'imported',
		'register_date',
		'permanence',
		'repetition',
		'permanence_all',

		'expiration_day',
		'status_cash',

		'value_check',
		'number_check',
		'pre_dated_to',
		'receipt_file',
		'transfer_order_id',
		'financial_credit',
		'hours_credit',
		'fine_value',
		'link_payment_of_fine',
		'formpayment_of_fine',
		'asaas_fine',
		'informed_receipt',
		'start_avaliation',

		'created_by',
		'updated_by',
		'deleted_by',
	];

	protected $dates = ['deleted_at'];

	protected $appends = [ 'statusLabel', 'statusIcon', 'createdDate' ];

	public function setPhoneAttribute($val) {
		$this->attributes['phone'] = preg_replace('/\D/', '', $val);
	}

	public function setZipCodeAttribute($val) {
		$this->attributes['zip_code'] = preg_replace('/\D/', '', $val);
	}

	public function setBirthDateAttribute($val) {
		$this->attributes['birth_date'] = formatDateEng($val);
	}

	public function setDueDateAttribute($val) {
		$this->attributes['due_date'] = formatDateEng($val);
	}

	public function setPaydayAttribute($val) {
		$this->attributes['payday'] = formatDateEng($val);
	}

	public function setBankIdAttribute($val) {
		$this->attributes['bank_id'] = empty($val) ? null : $val;
	}

	public function setValuePaidAttribute($val) {
		$this->attributes['value_paid'] = empty($val) ? null : toNumberFormat($val);
	}

	public function setCpfAttribute($val) {
		$this->attributes['cpf'] = empty($val) ? null : Crypt::encrypt(preg_replace('/\D/', '', $val));
	}

	public function setCardholderAttribute($val) {
		$this->attributes['cardholder'] = empty($val) ? null : Crypt::encrypt($val);
	}

	public function setNumberCardAttribute($val) {
		$this->attributes['number_card'] = empty($val) ? null : Crypt::encrypt($val);
	}

	public function setSecurityCodeAttribute($val) {
		$this->attributes['security_code'] = empty($val) ? null : Crypt::encrypt($val);
	}

	public function setShelfLifeAttribute($val) {
		$this->attributes['shelf_life'] = empty($val) ? null : Crypt::encrypt($val);
	}

	public function setRegisterDateAttribute($val) {
		$this->attributes['register_date'] = formatDateEng($val);
	}

	public function setValueCheckAttribute($val) {
		$this->attributes['value_check'] = empty($val) ? null : toNumberFormat($val);
	}

	public function setPreDatedToAttribute($val) {
		$this->attributes['pre_dated_to'] = formatDateEng($val);
		$this->attributes['payday'] = $this->attributes['pre_dated_to'];
	}

	public function getCpfAttribute($val) {
		return empty($val) ? null : Crypt::decrypt($val);
	}

	public function getCardholderAttribute($val) {
		return empty($val) ? null : Crypt::decrypt($val);
	}

	public function getNumberCardAttribute($val) {
		return empty($val) ? null : Crypt::decrypt($val);
	}

	public function getSecurityCodeAttribute($val) {
		return empty($val) ? null : Crypt::decrypt($val);
	}

	public function getShelfLifeAttribute($val) {
		return empty($val) ? null : Crypt::decrypt($val);
	}

	public function getStatusLabelAttribute() {
		if (isset($this->attributes['status'])) {
			foreach (OrderModel::getStatusList() as $status) {
				if ($this->attributes['status'] == $status['flg']) {
					return $status['label'];
				}
			}
		}

		return null;
	}

	public function getStatusIconAttribute() {
		if (isset($this->attributes['status'])) {
			foreach (OrderModel::getStatusList() as $status) {
				if ($this->attributes['status'] == 'PE' && !$this->attributes['asaas_payments_code']) {

					if ($status['flg'] == 'PA') {
						return $status['icon'];
					}

				} else
				if ($this->attributes['status'] == $status['flg']) {
					return $status['icon'];
				}
			}
		}

		return null;
	}

	public function getBirthDateAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getCreatedDateAttribute() {
		return $this->attributes['created_at'] ?? '';
	}

	public function getCreatedAtAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getRegisterDateAttribute($val) {
		return empty($val) ? '' : Carbon::parse($val)->format('d/m/Y');
	}

	public function getNumberParcelAttribute($val) {
		return empty($val) ? 1 : $val;
	}

	public function getAsaasFineAttribute($val) {
		return empty($val) ? $val : json_decode($val);
	}

	public function orderParcel() {
		return $this->hasMany('App\Model\api\OrderParcelModel', 'order_id');
	}

	public function formPayment() {
		return $this->belongsTo('App\Model\api\FormPaymentModel');
	}

	public function student() {
		return $this->belongsTo('\App\Model\api\StudentModel');
	}

	public function courseFormPayment() {
		return $this->belongsTo('\App\Model\api\CourseFormPaymentModel');
	}

	public function course() {
		return $this->belongsTo('\App\Model\api\Prospection\CourseModel');
	}

	public function class() {
		return $this->belongsTo('\App\Model\api\Prospection\ClassModel');
	}

	public function supervision() {
		return $this->belongsTo('\App\Model\api\CourseSupervisionModel');
	}

	public function responsible() {
		return $this->belongsTo('App\Model\api\UserModel', 'responsible_id');
	}

	public function errorAsaas() {
		return $this->hasMany('\App\Model\api\ErrorAsaasModel', 'order_id');
	}

	public function studentClassControl() {
		return $this->hasMany('\App\Model\api\StudentClassControlModel', 'order_id');
	}

	public function avaliationStudent() {
		return $this->hasMany('App\Model\api\AvaliationStudentModel', 'order_id');
	}

	public static function getStatusList() {
		return [
			[
				'flg' => 'AP',
				'label' => 'Liberado',
				'icon' => '<i class="fa fa-circle text-green" title="Liberado"></i>',
			],
			[
				'flg' => 'PE',
				'label' => 'Pendente',
				'icon' => '<i class="fa fa-circle text-warning" title="Pendente"></i>',
			],
			[
				'flg' => 'PA',
				'label' => 'Não Processado ASAAS',
				'icon' => '<i class="fa fa-circle text-warning" title="Pendente"></i><i class="fa fa-circle" style="color: #9801f7; " title="Não Processado pelo ASAAS"></i>',
			],
			[
				'flg' => 'CA',
				'label' => 'Cancelado',
				'icon' => '<i class="fa fa-circle text-danger" title="Cancelado"></i>',
			],
			[
				'flg' => 'IN',
				'label' => 'Inativo',
				'icon' => '<i class="fa fa-circle text-muted" title="Inativo"></i>',
			],
			[
				'flg' => 'LC',
				'label' => 'Trancado',
				'icon' => '<i class="fa fa-circle text-success" title="Trancado"></i>',
			],
			[
				'flg' => 'FI',
				'label' => 'Finalizado',
				'icon' => '<i class="fa fa-circle text-primary" title="Finalizado"></i>',
			],
			[
				'flg' => 'BL',
				'label' => 'Bloqueado',
				'icon' => '<i class="fa fa-circle" style="color: #845209;" title="Bloqueado"></i>',
			],
			[
				'flg' => 'TR',
				'label' => 'Transferido',
				'icon' => '<i class="fa fa-circle" style="color: #0777a4;" title="Transferido"></i>',
			],
			[
				'flg' => 'TRC',
				'label' => 'Transferido',
				'icon' => '<i class="fa fa-circle" style="color: #0777a4;" title="Transferido"></i>',
			],
		];
	}

	public static function getStatusAsaasList() {
		return [
			'PENDING' => [
				'flg' => 'PENDING',
				'label' => 'Aguardando pagamento',
			],
			'RECEIVED' => [
				'flg' => 'RECEIVED',
				'label' => 'Recebida (saldo já creditado na conta)',
			],
			'CONFIRMED' => [
				'flg' => 'CONFIRMED',
				'label' => 'Pagamento confirmado (saldo ainda não creditado)',
			],
			'OVERDUE' => [
				'flg' => 'OVERDUE',
				'label' => 'Vencida',
			],
			'REFUNDED' => [
				'flg' => 'REFUNDED',
				'label' => 'Estornada',
			],
			'RECEIVED_IN_CASH' => [
				'flg' => 'RECEIVED_IN_CASH',
				'label' => 'Recebida em dinheiro (não gera saldo na conta)',
			],
			'REFUND_REQUESTED' => [
				'flg' => 'REFUND_REQUESTED',
				'label' => 'Estorno Solicitado',
			],
			'CHARGEBACK_REQUESTED' => [
				'flg' => 'CHARGEBACK_REQUESTED',
				'label' => 'Recebido chargeback',
			],
			'CHARGEBACK_DISPUTE' => [
				'flg' => 'CHARGEBACK_DISPUTE',
				'label' => 'Em disputa de chargeback (caso sejam apresentados documentos para contestação)',
			],
			'AWAITING_CHARGEBACK_REVERSAL' => [
				'flg' => 'AWAITING_CHARGEBACK_REVERSAL',
				'label' => 'Disputa vencida, aguardando repasse da adquirente',
			],
			'DUNNING_REQUESTED' => [
				'flg' => 'DUNNING_REQUESTED',
				'label' => 'Em processo de recuperação',
			],
			'DUNNING_RECEIVED' => [
				'flg' => 'DUNNING_RECEIVED',
				'label' => 'Recuperada',
			],
			'AWAITING_RISK_ANALYSIS' => [
				'flg' => 'AWAITING_RISK_ANALYSIS',
				'label' => 'Pagamento em análise',
			],
		];
	}
}
