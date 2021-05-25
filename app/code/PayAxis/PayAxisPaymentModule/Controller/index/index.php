<?php
namespace PayAxis\PayAxisPaymentModule\Controller\Index;

use \Magento\Framework\App\Action\Action;
  use Psr\Log\LoggerInterface;
 
class Index extends Action
{
    /** @var \Magento\Framework\View\Result\PageFactory  */
    protected $resultPageFactory;
    private $orderFactory;
    protected $_checkoutSession;
    protected $scopeConfig;
    
    public $currency;
    public $Amount;
    public $ExpiryTime;
    public $_TxnRefNumber;
    public $_TxnDateTime;
    public $_Description;
    
    const XML_PATH_ACTIONURL = 'payment/payaxispaymentmethod/actionurl';
    const XML_PATH_MERCHANTID = 'payment/payaxispaymentmethod/merchantid';
    const XML_PATH_PASSWORD = 'payment/payaxispaymentmethod/password';
    const XML_PATH_RETURNURL = 'payment/payaxispaymentmethod/returnurl';
     const XML_PATH_IntegritySalt = 'payment/payaxispaymentmethod/IntegritySalt';
	  const XML_PATH_ExpiryHours = 'payment/payaxispaymentmethod/ExpiryHours';
	  
public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Sales\Model\Order $salesOrderFactory,
       \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,        
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    ) {
        $this->_checkoutSession = $checkoutSession;
        $this->_orderFactory = $salesOrderFactory;
         $this->scopeConfig = $scopeConfig;        
        parent::__construct($context);
    }
    public function execute()
    {
    
        $orderId = $this->_checkoutSession->getLastOrderId();
		$order =  $this->_orderFactory->load($orderId);
         $orderItems = $order->getdata();  
         $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
         
        $ActionURL = $this->scopeConfig->getValue(self::XML_PATH_ACTIONURL, $storeScope);
               $MerchantID = $this->scopeConfig->getValue(self::XML_PATH_MERCHANTID, $storeScope);
                      $Password = $this->scopeConfig->getValue(self::XML_PATH_PASSWORD, $storeScope);
                             $ReturnURL = $this->scopeConfig->getValue(self::XML_PATH_RETURNURL, $storeScope);
                              $IntegritySalt = $this->scopeConfig->getValue(self::XML_PATH_IntegritySalt, $storeScope);
							   $ExpiryHours = $this->scopeConfig->getValue(self::XML_PATH_ExpiryHours, $storeScope);
        
      foreach($order->getAllItems() as $item)
      {
         $ProdustIds[]= $item->getProductId(); 
         $proName[] = $item->getName(); // product name
      }

        

        $_Description = implode(",", $proName);
        $currency = $orderItems['base_currency_code'];
        $Amount= $orderItems['grand_total'];
        $final_orderid = $orderItems['increment_id'];
        $_AmountTmp = $Amount*100;
        $_AmtSplitArray = explode('.', $_AmountTmp);
        $_FormattedAmount = $_AmtSplitArray[0];
		$ExpiryTime = date('YmdHis', strtotime("+".$ExpiryHours." hours"));
     //   $ExpiryTime = date('YmdHis', strtotime("+5 days"));
        $_TxnRefNumber = "TXN1". date('YmdHis');
        $_TxnDateTime =   date('YmdHis');
        $pp_language = 'EN';
		$pp_version = '1.1';
		
		//Calculating Hash
		$SortedArrayOld =$IntegritySalt.'&'.$_FormattedAmount.'&'.$final_orderid.'&'.$_Description.'&'.$pp_language.'&'.$MerchantID.'&'.$Password.'&'.$ReturnURL.'&'.$currency.'&'.$_TxnDateTime.'&'.$ExpiryTime.'&'.$_TxnRefNumber.'&'.$pp_version.'&'.'1'.'&'.'2'.'&'.'3'.'&'.'4'.'&'.'5';
		$pp_securehash = hash_hmac('sha256', $SortedArrayOld, $IntegritySalt);
		
		
        $RequestLog ="Request sent to Payment Gateway : Start \n" ;
        $RequestLog .="pp_Version :".$pp_version."\n";
        $RequestLog .= "pp_TxnType  : \n";
        $RequestLog .= "pp_Language  :".$pp_language."\n";
        $RequestLog .= "pp_MerchantID  :".$MerchantID."\n";
        $RequestLog .= "pp_SubMerchantID  : \n";
        $RequestLog .= "pp_Password  :".$Password."\n";
        $RequestLog .= "pp_BankID  : \n";
        $RequestLog .= "pp_ProductID  : \n";
        $RequestLog .= "pp_TxnRefNo  :".$_TxnRefNumber."\n";
        $RequestLog .= "pp_Amount  :".$_FormattedAmount."\n";
        $RequestLog .= "pp_TxnCurrency  :".$currency."\n";
        $RequestLog .= "pp_TxnDateTime  :".$_TxnDateTime."\n";
        $RequestLog .= "pp_BillReference  :".$final_orderid."\n";
        $RequestLog .= "pp_Description  :".$_Description."\n";
        $RequestLog .= "pp_TxnExpiryDateTime  :".$ExpiryTime."\n";
        $RequestLog .= "pp_ReturnURL  :".$ReturnURL."\n";
        $RequestLog .= "pp_SecureHash :".$pp_securehash."\n";
        
        $RequestLog .= "ppmpf_1  : 1\n";
        $RequestLog .= "ppmpf_2  : 2\n";
        $RequestLog .= "ppmpf_3  : 3\n";
        $RequestLog .= "ppmpf_4  : 4\n";
        $RequestLog .= "ppmpf_5  : 5\n";
        $RequestLog .="Request sent to Payment Gateway : End \n" ;
        
        
        // var_dump($RequestLog);
        // var_dump($ActionURL);die;
// $this->_objectManager->get('Psr\Log\LoggerInterface')->debug($RequestLog);
// $this->_objectManager->get('Psr\Log\LoggerInterface')->addDebug($RequestLog);
              ?>
              <body onload="submitForm()"></body>
            <script>
function submitForm()
{
document.jsform.submit();
}
</script>
              <form name="jsform" method="post" action="<?php echo $ActionURL; ?>">
              <?php
                //echo "<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>";
                
               echo "<input type='hidden' name='pp_Version' value='1.1' >";
                 echo "<input type='hidden' name='pp_TxnType' value=''>";
                   echo "<input type='hidden' name='pp_Language' value='EN'>";
                     echo "<input type='hidden' name='pp_MerchantID' value='".$MerchantID."' >";
                       echo "<input type='hidden' name='pp_SubMerchantID' value='' >";
                         echo "<input type='hidden' name='pp_Password' value='".$Password."' >";
                           echo "<input type='hidden' name='pp_BankID' value=''>";
                             echo "<input type='hidden' name='pp_ProductID' value=''>";
                               echo "<input type='hidden' name='pp_TxnRefNo' value='".$_TxnRefNumber."'>";
                                 echo "<input type='hidden' name='pp_Amount' value='".$_FormattedAmount."'>";
                                  echo "<input type='hidden' name='pp_TxnCurrency' value='".$currency."'>";
                                     echo "<input type='hidden' name='pp_TxnDateTime' value='".$_TxnDateTime."'>";
                                       echo "<input type='hidden' name='pp_BillReference' value='".$final_orderid."'>";
                                         echo "<input type='hidden' name='pp_Description' value='".$_Description."'>";
                                           echo "<input type='hidden' name='pp_TxnExpiryDateTime' value='".$ExpiryTime."'>";
                                           
                                               echo "<input type='hidden' name='pp_ReturnURL' value='".$ReturnURL."' >";
                                               echo "<input type='hidden' name='pp_SecureHash' value='".$pp_securehash."' >";

                                                echo "<input type='hidden' name='ppmpf_1' value='1'>";
                                                echo "<input type='hidden' name='ppmpf_2' value='2'>";
                                                 echo "<input type='hidden' name='ppmpf_3' value='3'>";
                                                 echo "<input type='hidden' name='ppmpf_4' value='4'>";
                                                  echo "<input type='hidden' name='ppmpf_5' value='5'>";
  
  
   }
}
?>
</form>
<script type="text/javascript">
    document.jsform.submit();
</script>


