<?php
/**
 * Box packing (3D bin packing, knapsack problem)
 * @author Doug Wright
 * @copyright 2012-2016 Doug Wright
 * @license MIT
 */

namespace MPBpostModule\BoxPacker;

if (!defined('_PS_VERSION_')) {
    return;
}

require_once dirname(__FILE__).'/../../myparcelbpost.php';

/**
 * List of boxes available to put items into, ordered by volume
 * @author Doug Wright
 * @package MyParcelModule\BoxPacker
 */
class BoxList extends \SplMinHeap
{
    /**
     * Compare elements in order to place them correctly in the heap while sifting up.
     * @see \SplMinHeap::compare()
     */
    public function compare($boxA, $boxB)
    {
        if ($boxB->getInnerVolume() > $boxA->getInnerVolume()) {
            return 1;
        } elseif ($boxB->getInnerVolume() < $boxA->getInnerVolume()) {
            return -1;
        } else {
            return 0;
        }
    }
}
