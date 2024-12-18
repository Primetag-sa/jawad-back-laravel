<?php

declare(strict_types=1);

namespace PhpMqtt\Client;

/**
 * The settings used during connection to a broker.
 *
 * This class is immutable and all setters return a clone of the original class because
 * connection settings must not change once passed to MqttClient.
 *
 * @package PhpMqtt\Client
 */
class ConnectionSettings
{
    private ?string $username                          = null;
    private ?string $password                          = null;
    private bool $useBlockingSocket                    = false;
    private int $connectTimeout                        = 60;
    private int $socketTimeout                         = 5;
    private int $resendTimeout                         = 10;
    private int $keepAliveInterval                     = 10;
    private bool $reconnectAutomatically               = false;
    private int $maxReconnectAttempts                  = 3;
    private int $delayBetweenReconnectAttempts         = 0;
    private ?string $lastWillTopic                     = null;
    private ?string $lastWillMessage                   = null;
    private int $lastWillQualityOfService              = 0;
    private bool $lastWillRetain                       = false;
    private bool $useTls                               = false;
    private bool $tlsVerifyPeer                        = true;
    private bool $tlsVerifyPeerName                    = true;
    private bool $tlsSelfSignedAllowed                 = false;
    private ?string $tlsCertificateAuthorityFile       = null;
    private ?string $tlsCertificateAuthorityPath       = null;
    private ?string $tlsClientCertificateFile          = null;
    private ?string $tlsClientCertificateKeyFile       = null;
    private ?string $tlsClientCertificateKeyPassphrase = null;
    private ?string $tlsAlpn                           = null;

    /**
     * The username used for authentication when connecting to the broker.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setUsername(?string $username): ConnectionSettings
    {
        $copy = clone $this;

        $copy->username = $username;

        return $copy;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * The password used for authentication when connecting to the broker.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setPassword(?string $password): ConnectionSettings
    {
        $copy = clone $this;

        $copy->password = $password;

        return $copy;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Whether to use a blocking socket when publishing messages or not.
     * Normally, this setting can be ignored. When publishing large messages with multiple kilobytes in size,
     * a blocking socket may be required if the receipt buffer of the broker is not large enough.
     *
     * Note: This setting has no effect on subscriptions, only on the publishing of messages.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function useBlockingSocket(bool $useBlockingSocket): ConnectionSettings
    {
        $copy = clone $this;

        $copy->useBlockingSocket = $useBlockingSocket;

        return $copy;
    }

    public function shouldUseBlockingSocket(): bool
    {
        return $this->useBlockingSocket;
    }

    /**
     * The connect timeout is the maximum amount of seconds the client will try to establish
     * a socket connection with the broker. The value cannot be less than 1 second.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setConnectTimeout(int $connectTimeout): ConnectionSettings
    {
        $copy = clone $this;

        $copy->connectTimeout = $connectTimeout;

        return $copy;
    }

    public function getConnectTimeout(): int
    {
        return $this->connectTimeout;
    }

    /**
     * The socket timeout is the maximum amount of idle time in seconds for the socket connection.
     * If no data is read or sent for the given amount of seconds, the socket will be closed.
     * The value cannot be less than 1 second.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setSocketTimeout(int $socketTimeout): ConnectionSettings
    {
        $copy = clone $this;

        $copy->socketTimeout = $socketTimeout;

        return $copy;
    }

    public function getSocketTimeout(): int
    {
        return $this->socketTimeout;
    }

    /**
     * The resend timeout is the number of seconds the client will wait before sending a duplicate
     * of pending messages without acknowledgement. The value cannot be less than 1 second.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setResendTimeout(int $resendTimeout): ConnectionSettings
    {
        $copy = clone $this;

        $copy->resendTimeout = $resendTimeout;

        return $copy;
    }

    public function getResendTimeout(): int
    {
        return $this->resendTimeout;
    }

    /**
     * The keep alive interval is the number of seconds the client will wait without sending a message
     * until it sends a keep alive signal (ping) to the broker. The value cannot be less than 1 second
     * and may not be higher than 65535 seconds. A reasonable value is 10 seconds (the default).
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setKeepAliveInterval(int $keepAliveInterval): ConnectionSettings
    {
        $copy = clone $this;

        $copy->keepAliveInterval = $keepAliveInterval;

        return $copy;
    }

    public function getKeepAliveInterval(): int
    {
        return $this->keepAliveInterval;
    }

    /**
     * This flag determines whether the client will try to reconnect automatically,
     * if it notices a disconnect while sending data.
     * The setting cannot be used together with the clean session flag.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setReconnectAutomatically(bool $reconnectAutomatically): ConnectionSettings
    {
        $copy = clone $this;

        $copy->reconnectAutomatically = $reconnectAutomatically;

        return $copy;
    }

    public function shouldReconnectAutomatically(): bool
    {
        return $this->reconnectAutomatically;
    }

    /**
     * Defines the maximum number of reconnect attempts until the client gives up. This setting
     * is only relevant if {@see setReconnectAutomatically()} is set to true.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setMaxReconnectAttempts(int $maxReconnectAttempts): ConnectionSettings
    {
        $copy = clone $this;

        $copy->maxReconnectAttempts = $maxReconnectAttempts;

        return $copy;
    }

    public function getMaxReconnectAttempts(): int
    {
        return $this->maxReconnectAttempts;
    }

    /**
     * Defines the delay between reconnect attempts in milliseconds.
     * This setting is only relevant if {@see setReconnectAutomatically()} is set to true.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setDelayBetweenReconnectAttempts(int $delayBetweenReconnectAttempts): ConnectionSettings
    {
        $copy = clone $this;

        $copy->delayBetweenReconnectAttempts = $delayBetweenReconnectAttempts;

        return $copy;
    }

    public function getDelayBetweenReconnectAttempts(): int
    {
        return $this->delayBetweenReconnectAttempts;
    }

    /**
     * If the broker should publish a last will message in the name of the client when the client
     * disconnects abruptly, this setting defines the topic on which the message will be published.
     *
     * A last will message will only be published if both this setting as well as the last will
     * message are configured.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setLastWillTopic(?string $lastWillTopic): ConnectionSettings
    {
        $copy = clone $this;

        $copy->lastWillTopic = $lastWillTopic;

        return $copy;
    }

    public function getLastWillTopic(): ?string
    {
        return $this->lastWillTopic;
    }

    /**
     * If the broker should publish a last will message in the name of the client when the client
     * disconnects abruptly, this setting defines the message which will be published.
     *
     * A last will message will only be published if both this setting as well as the last will
     * topic are configured.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setLastWillMessage(?string $lastWillMessage): ConnectionSettings
    {
        $copy = clone $this;

        $copy->lastWillMessage = $lastWillMessage;

        return $copy;
    }

    public function getLastWillMessage(): ?string
    {
        return $this->lastWillMessage;
    }

    /**
     * Determines whether the client has a last will.
     */
    public function hasLastWill(): bool
    {
        return $this->lastWillTopic !== null && $this->lastWillMessage !== null;
    }

    /**
     * The quality of service level the last will message of the client will be published with,
     * if it gets triggered.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setLastWillQualityOfService(int $lastWillQualityOfService): ConnectionSettings
    {
        $copy = clone $this;

        $copy->lastWillQualityOfService = $lastWillQualityOfService;

        return $copy;
    }

    public function getLastWillQualityOfService(): int
    {
        return $this->lastWillQualityOfService;
    }

    /**
     * This flag determines if the last will message of the client will be retained, if it gets
     * triggered. Using this setting can be handy to signal that a client is offline by publishing
     * a retained offline state in the last will and an online state as first message on connect.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setRetainLastWill(bool $lastWillRetain): ConnectionSettings
    {
        $copy = clone $this;

        $copy->lastWillRetain = $lastWillRetain;

        return $copy;
    }

    public function shouldRetainLastWill(): bool
    {
        return $this->lastWillRetain;
    }

    /**
     * This flag determines if TLS should be used for the connection. The port which is used to
     * connect to the broker must support TLS connections.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setUseTls(bool $useTls): ConnectionSettings
    {
        $copy = clone $this;

        $copy->useTls = $useTls;

        return $copy;
    }

    public function shouldUseTls(): bool
    {
        return $this->useTls;
    }

    /**
     * This flag determines if the peer certificate is verified, if TLS is used.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsVerifyPeer(bool $tlsVerifyPeer): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsVerifyPeer = $tlsVerifyPeer;

        return $copy;
    }

    public function shouldTlsVerifyPeer(): bool
    {
        return $this->tlsVerifyPeer;
    }

    /**
     * This flag determines if the peer name is verified, if TLS is used.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsVerifyPeerName(bool $tlsVerifyPeerName): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsVerifyPeerName = $tlsVerifyPeerName;

        return $copy;
    }

    public function shouldTlsVerifyPeerName(): bool
    {
        return $this->tlsVerifyPeerName;
    }

    /**
     * This flag determines if self signed certificates of the peer should be accepted.
     * Setting this to TRUE implies a security risk and should be avoided for production
     * scenarios and public services.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsSelfSignedAllowed(bool $tlsSelfSignedAllowed): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsSelfSignedAllowed = $tlsSelfSignedAllowed;

        return $copy;
    }

    public function isTlsSelfSignedAllowed(): bool
    {
        return $this->tlsSelfSignedAllowed;
    }

    /**
     * The path to a Certificate Authority certificate which is used to verify the peer
     * certificate, if TLS is used.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsCertificateAuthorityFile(?string $tlsCertificateAuthorityFile): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsCertificateAuthorityFile = $tlsCertificateAuthorityFile;

        return $copy;
    }

    public function getTlsCertificateAuthorityFile(): ?string
    {
        return $this->tlsCertificateAuthorityFile;
    }

    /**
     * The path to a directory containing Certificate Authority certificates which are
     * used to verify the peer certificate, if TLS is used.
     *
     * Certificate files in this directory must be named by the hash of the certificate,
     * ending with ".0" (without quotes). The certificate hash can be retrieved using the
     * openssl_x509_parse() function, which returns an array. The hash can be found in the
     * array under the key "hash".
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsCertificateAuthorityPath(?string $tlsCertificateAuthorityPath): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsCertificateAuthorityPath = $tlsCertificateAuthorityPath;

        return $copy;
    }

    public function getTlsCertificateAuthorityPath(): ?string
    {
        return $this->tlsCertificateAuthorityPath;
    }

    /**
     * The path to a client certificate file used for authentication, if TLS is used.
     *
     * The client certificate must be PEM encoded. It may optionally contain the
     * certificate chain of issuers. The certificate key can be included in this certificate
     * file or in a separate file ({@see ConnectionSettings::setTlsClientCertificateKeyFile()}).
     * A passphrase can be configured using {@see ConnectionSettings::setTlsClientCertificateKeyPassphrase()}.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsClientCertificateFile(?string $tlsClientCertificateFile): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsClientCertificateFile = $tlsClientCertificateFile;

        return $copy;
    }

    public function getTlsClientCertificateFile(): ?string
    {
        return $this->tlsClientCertificateFile;
    }

    /**
     * The path to a client certificate key file used for authentication, if TLS is used.
     *
     * This option requires {@see ConnectionSettings::setTlsClientCertificateFile()}
     * to be used as well.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsClientCertificateKeyFile(?string $tlsClientCertificateKeyFile): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsClientCertificateKeyFile = $tlsClientCertificateKeyFile;

        return $copy;
    }

    public function getTlsClientCertificateKeyFile(): ?string
    {
        return $this->tlsClientCertificateKeyFile;
    }

    /**
     * The passphrase used to decrypt the private key of the client certificate,
     * which in return is used for authentication, if TLS is used.
     *
     * This option requires {@see ConnectionSettings::setTlsClientCertificateFile()}
     * and {@see ConnectionSettings::setTlsClientCertificateKeyFile()} to be used as well.
     *
     * Please be aware that your passphrase is not stored in secure memory when using this option.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsClientCertificateKeyPassphrase(?string $tlsClientCertificateKeyPassphrase): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsClientCertificateKeyPassphrase = $tlsClientCertificateKeyPassphrase;

        return $copy;
    }

    public function getTlsClientCertificateKeyPassphrase(): ?string
    {
        return $this->tlsClientCertificateKeyPassphrase;
    }

    /**
     * The TLS ALPN is used to establish a TLS encrypted mqtt connection on port 443,
     * which usually is reserved for TLS encrypted HTTP traffic.
     *
     * @return ConnectionSettings A copy of the original object with the new setting applied.
     */
    public function setTlsAlpn(?string $tlsAlpn): ConnectionSettings
    {
        $copy = clone $this;

        $copy->tlsAlpn = $tlsAlpn;

        return $copy;
    }

    public function getTlsAlpn(): ?string
    {
        return $this->tlsAlpn;
    }

}
