<?php

declare(strict_types=1);

use Yieldstudio\TechnicalTestPhp\Serialize;
use Yieldstudio\TechnicalTestPhp\Tests\Support\AuthorData;
use Yieldstudio\TechnicalTestPhp\Tests\Support\PostData;

function getPostData (): PostData {
    return new PostData(
        uuid: 'b48232d2-433c-4d6e-8d75-17f6cb93de37',
        title: 'Hello world',
        content: 'Lorem ipsum dolor...',
        viewsCount: 100,
        author: new AuthorData(
            uuid: '77118065-a7e8-49d3-9b07-e80f4bb0e2e2',
            firstname: 'John',
            lastname: 'Doe',
            phoneNumber: '0601020304'
        ),
    );
}

it('can serialize object', function (): void {
    $postData = getPostData();

    $serializer = new Serialize();
    $output = $serializer->serialize($postData, ['public']);

    $response = file_get_contents(__DIR__ . '/response.json');

    expect($output)->toEqual($response);
});
