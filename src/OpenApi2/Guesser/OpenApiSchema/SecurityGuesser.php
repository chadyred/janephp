<?php

namespace Jane\OpenApi2\Guesser\OpenApiSchema;

use Jane\JsonSchema\Guesser\ClassGuesserInterface;
use Jane\JsonSchema\Guesser\GuesserInterface;
use Jane\JsonSchema\Registry;
use Jane\OpenApi2\JsonSchema\Model\ApiKeySecurity;
use Jane\OpenApi2\JsonSchema\Model\BasicAuthenticationSecurity;
use Jane\OpenApiCommon\Guesser\Guess\SecuritySchemeGuess;
use Jane\OpenApiCommon\Schema;

class SecurityGuesser implements GuesserInterface, ClassGuesserInterface
{
    /**
     * {@inheritdoc}
     */
    public function supportObject($object): bool
    {
        return ($object instanceof ApiKeySecurity || $object instanceof BasicAuthenticationSecurity) && \in_array($object->getType(), SecuritySchemeGuess::getAvailableTypes());
    }

    /**
     * {@inheritdoc}
     *
     * @param ApiKeySecurity|BasicAuthenticationSecurity $object
     */
    public function guessClass($object, string $name, string $reference, Registry $registry): void
    {
        $securitySchemeGuess = new SecuritySchemeGuess($name, $object->getType(), $object);

        /** @var Schema $schema */
        $schema = $registry->getSchema($reference);
        $schema->addSecurityScheme($reference, $securitySchemeGuess);
    }
}
