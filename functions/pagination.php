<?php

function getNumberOfPage($movies): int
{
	return (int)ceil(count($movies) / NUMBER_OF_MOVIES_PER_PAGE);
}
function getPageNumbersInFooter(int $page, int $numberOfPage): array
{
	if ($numberOfPage <= NUMBER_OF_PAGES_IN_THE_FOOTER)
	{
		$firstPageNumber = 1;
		$lastPageNumber = $numberOfPage;
	}
	else
	{
		if ($page - floor(NUMBER_OF_PAGES_IN_THE_FOOTER / 2) < 1)
		{
			$firstPageNumber = 1;
		}
		elseif ($page + floor(NUMBER_OF_PAGES_IN_THE_FOOTER / 2) > $numberOfPage)
		{
			$firstPageNumber = $numberOfPage - NUMBER_OF_PAGES_IN_THE_FOOTER + 1;
		}
		else
		{
			$firstPageNumber = $page - floor(NUMBER_OF_PAGES_IN_THE_FOOTER / 2);
		}
		$lastPageNumber = $firstPageNumber + NUMBER_OF_PAGES_IN_THE_FOOTER;
	}
	return ['first' => $firstPageNumber, 'last'=>$lastPageNumber];
}