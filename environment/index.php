<pre><?php
/**
 * RaceRoster interview questions
 * Created: 2014-05-02
 *
 * @todo Complete all the todo item's and fix any bugs along the way
 */

use RaceRoster\Interview;

setlocale(LC_MONETARY, 'en_US');

// Bonus @todo Replace with a single Composer generated auto-loader
/*
steps taken: 
1. curl -sS https://getcomposer.org/installer | php
2. php composer.phar install
3. php composer.phar dump-autoload -o
*/
require "vendor/autoload.php";
date_default_timezone_set('America/New_York');
try {
	$interview = new Interview(
        array(
            'name'    => 'Byron',
            'nickname' => 'M man',
            'age'               => 29,
            'yearsOfExperience' => 9.25
        ),
        new DateTime('2014-05-06')
    );

    // @todo Calculate the age the Interviewee when they started working using the provided methods
    // Replace 0 with the calculated answer
$working_age = $interview->getAge() - $interview->getYearsOfExperience();
echo sprintf('%s started working when they were %s years old', $interview->getName(), $working_age) . PHP_EOL;

// @todo echo the interview date in the format "January 1, 2000" using the provided methods
$date_time = $interview->getDate()->format('M d, Y');
echo sprintf('Today is %s', $date_time) . PHP_EOL;

// @todo echo the Time Zone abbreviation of the current time using the provided methods (eg MST, CST, EST)
echo sprintf('The current time zone is %s', date_default_timezone_get()) . PHP_EOL;

	$ageCheck = 21;
if($ageCheck = $interview->getAge()) {
	   echo sprintf('The interviewee is %d years old!', $ageCheck) . PHP_EOL;
}

} catch (InterviewException $e) {
    echo $e->getMessage();
}


// @todo Calculate and display the processing fee and the net order total when the fee is absorbed in the price.
$total 			= 456.78; // Gross
$processingFeePercentage	= 0.05;
$processingFeeFixed    = 0.10; // Always added on to the processing fee

// Calculate the following
// source for processing fee: https://help.opensrs.com/hc/en-us/articles/217106457-Calculation-of-the-3-processing-fee
$processingFee = $total/(1-$processingFeeFixed) - $total;
$netTotal  = $total - $processingFee; //not 100% sure on this

echo 'Processing Fee: $' . $processingFee . PHP_EOL;
echo 'Net Total: $' . $netTotal . PHP_EOL;

// @todo Recalculate and display the net total after we charge 13% HST on the processing fee
// Calculate the following based on the values above
$taxes    = ($processingFee * 0.13);
$netTotal	= $netTotal - $taxes;

echo 'Net Total with taxes: ' . $netTotal . PHP_EOL;

/**
 * @todo Answer: What issues could you see happen when dealing with currency?
 *When precise handling of money is required, php along with many other languages
 *lose decimal values, which when dealing with money is a major concern
 */


// @todo Optimize the following query
$qry = "SELECT
        a.eid,
        a.cid,
        b.e_date
    FROM RR_CHARITY a
    JOIN RR_EVENTS b ON a.eid = b.eid
    JOIN RR_CHARITY_TRANSACTIONS c ON a.cid = c.cid
    AND `trnDate` <= '2013-01-01 00:00:00'
    AND a.eid NOT IN(216,217,322);"; 
    /**
 * @todo Answer: Why is this slow in the first place?
 *WHERE a.cid IN (
        SELECT cid FROM RR_CHARITY_TRANSACTIONS WHERE `trnDate` <= '2013-01-01 00:00:00'
    )
 * Subquery is root cause    
 */
 ?>

