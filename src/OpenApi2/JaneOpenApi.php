<?php

namespace Jane\OpenApi2;

use Jane\JsonSchema\Generator\Naming;
use Jane\OpenApi2\Generator\AuthenticationGenerator;
use Jane\OpenApi2\Generator\GeneratorFactory;
use Jane\OpenApiCommon\Generator\ModelGenerator;
use Jane\OpenApiCommon\Generator\NormalizerGenerator;
use Jane\OpenApi2\Guesser\OpenApiSchema\GuesserFactory;
use Jane\OpenApi2\JsonSchema\Normalizer\NormalizerFactory;
use Jane\OpenApi2\SchemaParser\SchemaParser;
use PhpParser\ParserFactory;
use Jane\OpenApiCommon\JaneOpenApi as CommonJaneOpenApi;

class JaneOpenApi extends CommonJaneOpenApi
{
    protected const NORMALIZER_FACTORY_CLASS = NormalizerFactory::class;

    public static function build(array $options = [])
    {
        if ($options['client'] === self::CLIENT_HTTPLUG) {
            @trigger_error(sprintf('Generating "%s" client is deprecated, use the "%s" in the "client" option', self::CLIENT_HTTPLUG, self::CLIENT_PSR18));
        }

        $serializer = self::buildSerializer();
        $schemaParser = new SchemaParser($serializer);
        $generators = GeneratorFactory::build($serializer, $options);
        $naming = new Naming();
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $modelGenerator = new ModelGenerator($naming, $parser);
        $normGenerator = new NormalizerGenerator($naming, $parser, $options['reference'] ?? false, $options['use-cacheable-supports-method'] ?? false, $options['normalizer-force-null-when-nullable'] ?? true);
        $authGenerator = new AuthenticationGenerator($naming);

        $self = new self(
            $schemaParser,
            GuesserFactory::create($serializer, $options),
            $naming,
            $options['strict'] ?? true
        );

        $self->addGenerator($modelGenerator);
        $self->addGenerator($normGenerator);
        $self->addGenerator($authGenerator);

        foreach ($generators as $generator) {
            $self->addGenerator($generator);
        }

        return $self;
    }
}
